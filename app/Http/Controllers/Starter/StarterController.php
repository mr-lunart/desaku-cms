<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class StarterController extends Controller
{
    protected $config;

    public function __construct()
    {

        if( !(Storage::disk('local')->exists('.starter')) ){

            Storage::disk('local')->makeDirectory('.starter');
            $this->config = json_encode([
                'status'=>'disabled',
                'username'=>'',
                'password'=>'',
                'token'=>'',
                'roles'=>'supervisor'
            ]);
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
