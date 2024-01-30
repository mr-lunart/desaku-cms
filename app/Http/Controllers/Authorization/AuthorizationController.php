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
    public static function showEditor()
    {
        
    }
    public static function showMasterdata()
    {
        
    }
    public static function showWebconfig()
    {
        
    }
    public static function showAppearance()
    {
        
    }
    public static function showWebreport()
    {
        
    }
    public static function showGallery()
    {
        
    }
    public static function showComment()
    {
        
    }
    public static function showAdminManajer()
    {
        
    }
}
