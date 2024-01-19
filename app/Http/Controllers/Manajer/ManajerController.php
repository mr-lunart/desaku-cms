<?php

namespace App\Http\Controllers\Manajer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;

class ManajerController extends Controller
{
    public static function getAdmin() {
        $admins = Admin::all();
        return $admins;
    }
    public static function createAdmin(Request $request) {
        
        try {
            $query = Admin::factory()->create([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'roles'=>'administrator'
            ]);

            return redirect()->route('manajer',['status'=>'failed','admin_no'=>$query->no,'username'=>$query->username]);

        } catch (Exception $e) {
            $except= explode(':',$e->getMessage())[0];
            if($except == 'SQLSTATE[23000]'){
                return redirect()->route('manajer',['status'=>'failed']);
            }
            else{
                return redirect()->route('manajer',['status'=>'uknown error']);
            }
            
        }
        
        
    }
}
