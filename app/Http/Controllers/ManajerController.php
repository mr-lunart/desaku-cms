<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManajerController extends Controller
{
    //
    public static function index() {
        return view('manajer');
    }
}
