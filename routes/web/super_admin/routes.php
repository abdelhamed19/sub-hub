<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\SuperAdminController;
use App\Http\Controllers\Web\SuperAdmin\ClientManageController;
use App\Http\Controllers\Web\SuperAdmin\SuperAdminManageController;
use App\Http\Controllers\Web\SuperAdmin\ClientAssistantManageController;

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
        Route::post('/logout', [SuperAdminController::class, 'logout'])->name('super_admin.auth.logout')->middleware('check.role:all');
        Route::get('/', [SuperAdminController::class, 'dashboard'])->name('super_admin.dashboard')->middleware('check.role:all');
        Route::get('/manage', [SuperAdminManageController::class, 'index'])->name('super_admin.manage')->middleware('check.role:all');
        Route::get('/create', [SuperAdminManageController::class, 'create'])->name('super_admin.create')->middleware('check.role:all');
        Route::post('/store', [SuperAdminManageController::class, 'store'])->name('super_admin.store')->middleware('check.role:all');
        Route::get('/{id}/show', [SuperAdminManageController::class, 'show'])->name('super_admin.show')->middleware('check.role:all');
        Route::get('/{id}/edit', [SuperAdminManageController::class, 'edit'])->name('super_admin.edit')->middleware('check.role:super');
        Route::post('/{id}/update', [SuperAdminManageController::class, 'update'])->name('super_admin.update')->middleware('check.role:super');
        Route::delete('/{id}/delete', [SuperAdminManageController::class, 'delete'])
            ->name('super_admin.delete')->middleware('check.role:super');

        Route::get('/client/dashboard', [ClientManageController::class, 'dashboard'])->name('super_admin.client.dashboard');
        Route::get('/client/manage', [ClientManageController::class, 'index'])->name('super_admin.client.manage');
        Route::get('/client/create', [ClientManageController::class, 'create'])->name('super_admin.client.create');
        Route::post('/client/store', [ClientManageController::class, 'store'])->name('super_admin.client.store');
        Route::get('/client/{client}', [ClientManageController::class, 'show'])->name('super_admin.client.show');
        Route::get('/client/{client}/edit', [ClientManageController::class, 'edit'])->name('super_admin.client.edit');
        Route::put('/client/{client}/update', [ClientManageController::class, 'update'])->name('super_admin.client.update');
        Route::delete('/client/{client}/delete', [ClientManageController::class, 'delete'])->name('super_admin.client.delete');
        Route::post('/client/{id}/restore', [ClientManageController::class, 'restore'])->name('super_admin.client.restore');
        Route::delete('/client/{id}/force-delete', [ClientManageController::class, 'forceDelete'])->name('super_admin.client.force_delete');

        Route::get('/client/client-assistant/manage', [ClientAssistantManageController::class, 'index'])->name('super_admin.client_assistant.manage');
        Route::get('/client/client-assistant/create', [ClientAssistantManageController::class, 'create'])->name('super_admin.client_assistant.create');
        Route::post('/client/client-assistant/store', [ClientAssistantManageController::class, 'store'])->name('super_admin.client_assistant.store');
        Route::get('/client/client-assistant/{assistant}/show', [ClientAssistantManageController::class, 'show'])->name('super_admin.client_assistant.show');
        Route::get('/client/client-assistant/{assistant}/edit', [ClientAssistantManageController::class, 'edit'])->name('super_admin.client_assistant.edit');
        Route::put('/client/client-assistant/{assistant}/update', [ClientAssistantManageController::class, 'update'])->name('super_admin.client_assistant.update');
        Route::delete('/client/client-assistant/{assistant}/delete', [ClientAssistantManageController::class, 'delete'])->name('super_admin.client_assistant.delete');
    });

// Auth
Route::prefix('/super-admin/auth')->group(function () {
    Route::get('/login', [SuperAdminController::class, 'loginForm'])->name('super_admin.auth.login');

    Route::post('/login', [SuperAdminController::class, 'validateLogin'])
        ->middleware('check.active:App\Models\SuperAdmin')
        ->name('super_admin.auth.login.submit');
});
