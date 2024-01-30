<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function __construct()
    {
    }

    public function getPermmision($permission)
    {
        $action = $permission;
        if(function_exists($action)){
            //call the method and save the value
            return $this->$action();
        }
        else {
            return ['method'=>404];
        }
    }

    public static function showDashboard()
    {
        
    }
}
