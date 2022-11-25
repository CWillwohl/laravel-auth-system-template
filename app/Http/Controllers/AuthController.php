<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Service\Auth\RegisterNewUserService;
use App\Http\Requests\Auth\StoreRegisterRequest;

class AuthController extends Controller
{

    public function __construct(
        private RegisterNewUserService $registerNewUserService,
    ){}

    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }


    public function forgotPassword(){
        return view('auth.forgot-password');
    }

    public function resetPassword(){
        return view('auth.reset-password');
    }

    public function verifyEmail(){
        return view('auth.verify-email');
    }

    public function store(StoreRegisterRequest $request){
        $this->registerNewUserService->handle($request);

        return redirect()->route('auth.login');
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
