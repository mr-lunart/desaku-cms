<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StarterController extends Controller
{
    public static $config;

    public function __construct()
    {
        if( !(Storage::disk('local')->exists('.starter')) AND !(Storage::disk('local')->exists('.starter/.sirandu.json')) ){
            
            Storage::disk('local')->makeDirectory('.starter');
            self::$config = json_encode([
                'status'=>'activated',
                'username'=>'',
                'password'=>'',
                'token'=>'',
                'roles'=>'supervisor'
            ]);
        }
    }

    public static function connectionCheck(){
        try {
            DB::connection()->getDatabaseName();
            return "connected";
            // Database exists and connection is successful
          } catch (Exception $e) {
            // Database connection failed, likely indicating non-existence
            return $e;
          }
    }

    public static function starter()
    {
        if(Storage::disk('local')->exists('.starter/.sirandu.json') ){
            $json = Storage::disk('local')->get('.starter/.sirandu.json');
            $config = json_decode($json);

            if( $config->status == 'disabled' ){
                return view('starter');
            }
            elseif( $config->status == 'activated' ){
                return view('login');
            }
        }
        else {
            Storage::disk('local')->put('.starter/.sirandu.json',self::$config);
        }
    }
}
