<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\SuperAdminController;
use App\Http\Controllers\Web\SuperAdmin\SuperAdminManageController;

/*
|--------------------------------------------------------------------------
| Super Admin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register super admin web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware(['auth:super_admin'])->
prefix('/super-admin')
->group(function () {
    // Home Page
    Route::get('/', [SuperAdminController::class, 'dashboard'])->name('super_admin.dashboard');
    Route::get('/manage', [SuperAdminManageController::class, 'index'])->name('super_admin.manage');
});

// Auth
Route::prefix('/super-admin/auth')->group(function () {
    Route::get('/login', [SuperAdminController::class, 'loginForm'])->name('super_admin.auth.login');

    Route::post('/login', [SuperAdminController::class, 'validateLogin'])
        ->middleware('check.active:App\Models\SuperAdmin')
        ->name('super_admin.auth.login.submit');

    Route::post('/logout', [SuperAdminController::class, 'logout'])->name('super_admin.auth.logout');
});
