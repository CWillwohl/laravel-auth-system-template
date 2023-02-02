<?php

use App\Http\Controllers\AuthController;
use Illuminate\Routing\Controllers\Middleware;
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

Route::controller(AuthController::class)->group(function (){

    Route::middleware(['guest'])->group(function () {

        // Rotas de autenticação...
        // Authentication Routes...

        Route::get('/login', 'login')->name('auth.login');
        Route::post('/authenticate', 'authenticate')->name('auth.authenticate');

        // Rotas de Registro...
        // Register Routes...

        Route::get('/register', 'register')->name('auth.register');
        Route::post('/store', 'store')->name('auth.store');

        // Rotas de recuperação de senha...
        // Password Reset Routes...

        Route::get('/forgot-password', 'forgotPassword')->name('auth.forgot-password');
        Route::get('/change-password/{token}/{email}', 'changePassword')->name('password.reset');
        Route::post('/forgot-password', 'sendPasswordResetMail')->name('password.request');
        Route::post('/reset-password', 'updatePassword')->name('password.email');
    });

    Route::middleware(['auth'])->group(function (){

        // Rota de logout...
        // Logout Route...

        Route::post('/logout', 'logout')->name('auth.logout');

        // Rotas de verificação de email...
        // Email Verification Routes...

        Route::get('/verify-email', 'verifyEmail')
                ->name('verification.notice');
        Route::get('/email/verify/{id}/{hash}', 'verifiedEmail')
                ->middleware(['signed'])
                ->name('verification.verify');
        Route::post('/resend-verification-email', 'resendVerificationEmail')
                ->middleware(['throttle:6,1'])
                ->name('verification.send');
    });

});
