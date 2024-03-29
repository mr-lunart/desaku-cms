<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Authorization\AuthorizationController;
use Illuminate\Support\Facades\Storage;
 
use Illuminate\Http\Request;
use Parsedown;

class Dashboard extends Controller
{
    public static function dashboard()
    {
        // $auth = session()->get('authorization');
        // $id = session()->get('id_admin');
        // $test = new AuthorizationController();
        // $permit = $test->getPermission('showDashboard',$id);
        return view('dashboard');
    }
    public static function showdata(Request $request)
    {
        $Parsedown = new Parsedown();
        
        $Parsedown->setBreaksEnabled(true);
        
        Storage::disk('public')->put('article/file.md',$request->input('markdo'));
        $markdown = Storage::disk('public')->get('article/file.md');

        echo $Parsedown->text($markdown);
    }
}
