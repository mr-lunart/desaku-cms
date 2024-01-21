<?php

namespace App\Http\Controllers\Manajer;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManajerController extends Controller
{
    public static function getAdmin() {
        $admins = Admin::all();
        return $admins;
    }
    public static function createAdmin(Request $request) {

        // $validator = Validator::make([
        //     'name'=>'required|unique:posts|max:255',
        // ]);
        
        try {
            $query = Admin::factory()->create([
                'no' => 0,
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'roles'=>'administrator'
            ]);

            return redirect()->route('manajer',['status'=>'failed','admin_no'=>$query->no,'username'=>$query->username]);

        } catch (Exception $e) {
            $except= explode(':',$e->getMessage());
            return redirect()->route('manajer',['status'=>'failed','message'=>$except[0].$except[1]]);
        }
        
        
    }
}
