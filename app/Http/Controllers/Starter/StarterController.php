<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

use function PHPUnit\Framework\isNan;
use function PHPUnit\Framework\isNull;

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

    public static function databaseConfigCheck(){
        if ( env('DB_DATABASE') === "")
        {
            return [
                "key_name"=>'DB_DATABASE',
                "file_name"=>"env",
                "is_filled"=>false,
            ];
        }

        elseif ( env('DB_DATABASE') !== "")
        {
            return [
                "key_name"=>'DB_DATABASE',
                "file_name"=>"env",
                "is_filled"=>true,
            ];
        }
    }

    public static function connectionCheck(){

        if ($database_name = DB::connection()->getDatabaseName()=='sirandu')
        {
            try {
                DB::connection()->getPdo();
                return [200,'Pdo is connected'];
            // Database exists and connection is successful
            } catch (Exception $e) {
            // Database connection failed, likely indicating non-existence
                return [$e->getCode(),$e->getMessage()];
            // var_dump(DB::connection()->getPdo()->getAttribute(PDO::ATTR_CONNECTION_STATUS));
            }
        }
        else {
            return [404,'database sirandu not exist'];
        }
    }

    public static function starter()
    {
        $conn = StarterController::connectionCheck();
        if ( $conn[0] == 200 ){

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

        else {
            return view('installation');
        }
        
    }
}
