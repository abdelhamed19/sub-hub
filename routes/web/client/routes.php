<?php

use App\Http\Controllers\Web\SuperAdmin\ClientManageController;
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



Route::middleware(['auth:super_admin,client'])->
prefix('/client')
->group(function () {
    // Home Page

});


