<?php

namespace App\Http\Controllers\Manajer;

use App\Models\Admin;
use App\Http\Controllers\Controller;

class ManajerController extends Controller
{
    public static function getAdmins() {
        $admins = Admin::all();
        return $admins;
    }
}
