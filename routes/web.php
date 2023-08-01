<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//google_login
Route::get('/login/google/redirect', [App\Http\Controllers\SocialiteController::class, 'redirect'])->name('redirect_google');
Route::get('/login/google/callback', [App\Http\Controllers\SocialiteController::class, 'callback'])->name('callback');
