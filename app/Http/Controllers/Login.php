<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class Login extends Controller
{   
    protected $query;

    public function __construct()
    {
        $this->query = Admin::all($columns = ['*']);
    }

    public function login(Request $request)
    {
    
        if(!($request->filled(['username','password']))){
            return redirect()->route('admin',['status'=>'failed']);
        }
        // elseif($request->filled(['username','password'])){
        //     return Dashboard::dashboard();
        // }
        elseif($request->filled(['username','password'])){
            return redirect()->route('dashboard');
        }
        return redirect()->route('admin');
        
    }

}
