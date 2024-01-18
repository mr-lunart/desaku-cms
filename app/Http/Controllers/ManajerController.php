<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    //
    public static function index() {
        return view('manajer');
    }

    public static function getAdmins() {
        $admins = Admin::all();
        return $admins;
    }
}
