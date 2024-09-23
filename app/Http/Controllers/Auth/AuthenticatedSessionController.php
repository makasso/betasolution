<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LogHistory;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //addJavascriptFile('assets/js/custom/authentication/sign-in/general.js');

        return view('pages/auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $userLocation = Location::get($request->getClientIp());
        $request->user()->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
            'last_login_location' => $userLocation->cityName ?? app()->getLocale() == 'fr' ? 'Inconnu' : 'Unknown',
        ]);

        $agent = new Agent();

        LogHistory::insert([
            'user_id' => $request->user()->id,
            'action' => trans('admin/app.auth_page.signin'),
            'ip_address' => $request->getClientIp(),
            'user_agent' => $agent->browser() . ' | ' . $agent->platform(),
            'location' => $location->cityName ?? app()->getLocale() == 'fr' ? 'Inconnu' : 'Unknown',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $agent = new Agent();
        $location = Location::get($request->getClientIp());

        LogHistory::insert([
            'user_id' => $request->user()->id,
            'action' => trans('admin/app.app_header.signout'),
            'ip_address' => $request->getClientIp(),
            'user_agent' => $agent->browser() . ' | ' . $agent->platform(),
            'location' => $location->cityName ?? app()->getLocale() == 'fr' ? 'Inconnu' : 'Unknown',
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
