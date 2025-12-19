<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/dear', function () {
    return view('befor_auth');
})->name('befor_auth');

Route::get('/lang/{lang}', function ($lang) {
    $available = ['en', 'ar'];
    if (in_array($lang, $available)) {
        Session::put('lang', $lang);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('countries', function () {
    return Cache::rememberForever('countries_list', function () {
        return \App\Models\Country::all();
    });
});
