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
| contains the "web" middleware group. Now create something great!https://twitter.com/xetdoecommerce/status/1596199940497309698
|
*/

Route::controller(AuthController::class)->as('auth.')->group(function (){

    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::get('/change-password/{token}/{email}', 'changePassword')->name('reset-password');
    Route::get('/verify-email', 'verifyEmail')->name('verify-email');

    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/store', 'store')->name('store');
    Route::post('/forgot-password', 'sendPasswordResetMail')->name('send-password-reset-mail');
    Route::post('/reset-password', 'updatePassword')->name('update-password');
});
