<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Client Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Client web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::prefix('/client')->group(function () {
    // Home Page
    Route::get('/', function () {
        dd('Client Home Page');
    });

    // Auth
    Route::prefix('/auth')->group(function(){
        Route::get('/login', )->name('client.auth.login');

        Route::post('/login', )->name('client.auth.login.submit');
    });

})->middleware(['check.active:App\Models\ClientAssistant']);
