<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    protected $username;
    protected $password;

    public function __construct(Request $request)
    {
        if($request->filled('username') && $request->filled('password')){

            $request->validate([
                'username' => 'required|string|alpha_dash:ascii',
                'password' => 'required|string|alpha_dash:ascii'
            ]);

            $this->username = $request->input('username');
            $this->password = $request->input('password');
        }
        
    }

    public function login(Request $request)
    {
        $username = $this->username;
        $password = $this->password;
        #make credential
        $credentials = ['username'=>$username, 'password'=>$password];

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        }

        // $request->session()->regenerate();

        // return redirect()->route('dashboard');

    }

    public static function ownerAuth($request)
    {
        if (Storage::disk('local')->exists('.starter/.sirandu.json')) {
            #get sirandu value and check if its value activated or not
            $json = Storage::disk('local')->get('.starter/.sirandu.json');

            if (!(empty($json))) {
                $config = json_decode($json);
                if ($config->status == 'disabled') {
                    return redirect()->route('starter');
                } elseif ($config->status == 'activated') {

                    if (self::$username == $config->username && self::$password == $config->password) {
                        $request->session()->put('owner', $request->input('username'));
                    }
                }
            } else {

                return redirect()->route('starter');
            }
        }
    }

    public static function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}