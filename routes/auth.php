<?php

use App\Http\Controllers\AuthController;
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

Route::controller(AuthController::class)->as('auth.')->group(function (){

    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');

    Route::get('/reset-password', 'resetPassword')->name('reset-password');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');
    Route::post('/logout', 'logout')->name('logout');
});
