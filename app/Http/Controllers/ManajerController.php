<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    //
    public static function getAdmins() {
        $admins = Admin::all();
        return $admins;
    }

    public function manajerAdmin() {
        $admin = $this->getAdmins();
        return view('manajer',['admins'=>$admin]);
    }
}
