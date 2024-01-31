<?php

namespace App\Http\Controllers\Authorization;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorizationController extends Controller
{
    protected $id_admin;

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

    public function showDashboard()
    {
        $users = DB::table('permission')
            ->select('showDashboard', 'id_admin as '. $this->id_admin)
            ->get();
    }
    public function showEditor()
    {
        $users = DB::table('permission')
            ->select('showEditor', 'id_admin as '.$this->id_admin)
            ->get();
        
    }
    public function showMasterdata()
    {
        $users = DB::table('permission')
            ->select('showMasterdata', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showWebconfig()
    {
        $users = DB::table('permission')
            ->select('showWebconfig', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showAppearance()
    {
        $users = DB::table('permission')
            ->select('showAppearance', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showWebreport()
    {
        $users = DB::table('permission')
            ->select('showWebreport', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showGallery()
    {
        $users = DB::table('permission')
            ->select('showGallery', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showComment()
    {
        $users = DB::table('permission')
            ->select('showComment', 'id_admin as '.$this->id_admin)
            ->get();
    }
    public function showAdminManajer()
    {
        
    }
}
