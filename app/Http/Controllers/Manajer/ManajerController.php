<?php

namespace App\Http\Controllers\Manajer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class ManajerController extends Controller
{
    public static function getAdmin() {
        $admins = Admin::all();
        return $admins;
    }
    public static function createAdmin(Request $request) {
        
        $query = Admin::factory()->create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'roles'=>'administrator'
        ]);
        return $query;
    }
}
