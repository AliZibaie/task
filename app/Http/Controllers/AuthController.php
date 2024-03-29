<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegister(): view
    {
        return view('auth.register');
    }
    public function showLogin(): view
    {
        return view('auth.login');
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Auth::login($user, true);
        return redirect('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())){
            $user = User::where('email', $request->validated()['email'])->first();
//            $user = $this->userRepository->where('email', $request->validated()['email'])->first();
            Auth::login($user, true);
            return redirect('dashboard');
        }
        return back()->withErrors([
            'password' => ['wrong password!']
        ]);
    }
}
