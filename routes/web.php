<?php

use App\Http\Controllers\Apps\CategoryManagementController;
use App\Http\Controllers\Apps\CompanyManagementController;
use App\Http\Controllers\Apps\CourseManagementController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Apps\PermissionManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    // Course Management Routes
    Route::name('course-management.')->group(function () {
        Route::resource('/course-management/courses', CourseManagementController::class);
        Route::resource('/course-management/categories', CategoryManagementController::class);
    });

    // Company Routes
    Route::resource('/companies', CompanyManagementController::class);
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/', function() {
   return redirect()->route('dashboard');
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

Route::get('/change-language/{locale}', function ($locale = 'fr') {
    App::setLocale($locale);
    Session::put('locale', $locale);
    return redirect()->back();
})->name('change-language');

require __DIR__ . '/auth.php';
