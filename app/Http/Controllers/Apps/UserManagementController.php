<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\LogHistory;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:super admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.user-management.users.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $session_histories = LogHistory::where('user_id', $user->id)->latest()->get();
        return view('pages/apps.user-management.users.show', compact('user', 'session_histories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
