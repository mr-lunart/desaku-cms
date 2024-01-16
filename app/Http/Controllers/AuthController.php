<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public static function index(Request $request){
        $request->all;
    }

    public static function login(Request $request): RedirectResponse
    {
        $request->validate([
        'username' => 'required|string',
        'password' => 'required|string'
        ]);

        $credentials = request(['username','password']);
        if(!Auth::attempt($credentials))
        {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        }

        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }

    public static function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin');
    }
}
