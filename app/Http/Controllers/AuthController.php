<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public static function index(Request $request){
        $request->all;
    }

    public static function login(Request $request){
    $request->validate([
    'email' => 'required|string|email',
    'password' => 'required|string'
    ]);

    $credentials = request(['email','password']);
    if(!Auth::attempt($credentials))
    {
        return 'Unauthorized';
    // return response()->json([
    //     'message' => 'Unauthorized'
    // ],401);
    }

    $user = $request->user();
    $tokenResult = $user->createToken('Personal Access Token');
    $token = $tokenResult->plainTextToken;

    return response()->json([
    'accessToken' =>$token,
    'token_type' => 'Bearer',
    ]);
}
}
