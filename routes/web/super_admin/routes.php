<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\SuperAdminController;
use App\Http\Controllers\Web\SuperAdmin\ClientManageController;
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



Route::middleware(['auth:super_admin'])->prefix('/super-admin')
    ->group(function () {
        // Home Page
        Route::post('/logout', [SuperAdminController::class, 'logout'])->name('super_admin.auth.logout');
        Route::get('/', [SuperAdminController::class, 'dashboard'])->name('super_admin.dashboard');
        Route::get('/manage', [SuperAdminManageController::class, 'index'])->name('super_admin.manage')->middleware('check.role:all');
        Route::get('/create', [SuperAdminManageController::class, 'create'])->name('super_admin.create')->middleware('check.role:super,support');

        Route::get('/client/dashboard', [ClientManageController::class, 'dashboard'])->name('super_admin.client.dashboard');
        Route::get('/client/manage', [ClientManageController::class, 'index'])->name('super_admin.client.manage');
        Route::get('/client/create', [ClientManageController::class, 'create'])->name('super_admin.client.create');
        Route::get('/client/{client}', [ClientManageController::class, 'show'])->name('super_admin.client.show');
        Route::delete('/client/{client}/delete', [ClientManageController::class, 'delete'])->name('super_admin.client.delete');
        Route::post('/client/{id}/restore', [ClientManageController::class, 'restore'])->name('super_admin.client.restore');
        Route::delete('/client/{id}/force-delete', [ClientManageController::class, 'forceDelete'])->name('super_admin.client.force_delete');
    });

// Auth
Route::prefix('/super-admin/auth')->group(function () {
    Route::get('/login', [SuperAdminController::class, 'loginForm'])->name('super_admin.auth.login');

    Route::post('/login', [SuperAdminController::class, 'validateLogin'])
        ->middleware('check.active:App\Models\SuperAdmin')
        ->name('super_admin.auth.login.submit');
});
