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

    public function getPermission($permission, $id_admin): array
    {
        $this->id_admin = $id_admin;
        $action = $permission;
        if(method_exists($this,$action)){
            //call the method and save the value
            $result = $this->{$action}();
            return ['method'=>$result];
        }
        else {
            return ['method'=>404];
        }
    }

    public function showDashboard()
    {
        $permission = DB::table('permission')
            ->select('showDashboard')
            ->where( 'id_admin','=',$this->id_admin)
            ->get();
        return $permission[0]->showDashboard;
    }

    public function showEditor()
    {
        $permission = DB::table('permission')
            ->select('showEditor', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
        
    }

    public function showMasterdata()
    {
        $permission = DB::table('permission')
            ->select('showMasterdata', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showWebconfig()
    {
        $permission = DB::table('permission')
            ->select('showWebconfig', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showAppearance()
    {
        $permission = DB::table('permission')
            ->select('showAppearance', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showWebreport()
    {
        $permission = DB::table('permission')
            ->select('showWebreport', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showGallery()
    {
        $permission = DB::table('permission')
            ->select('showGallery', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showComment()
    {
        $permission = DB::table('permission')
            ->select('showComment', 'id_admin as '.$this->id_admin)
            ->get();
        return $permission;
    }

    public function showAdminManajer()
    {
        
    }
}
