<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class StarterController extends Controller
{
    public static $config = [
        'status' => 'activated',
        'username' => '',
        'password' => '',
        'roles' => 'owner'
    ];

    public function __construct()
    {
        // if( !(Storage::disk('local')->exists('.starter')) AND !(Storage::disk('local')->exists('.starter/.sirandu.json')) ){

        // Storage::disk('local')->makeDirectory('.starter');
        // self::$config = json_encode([
        //     'status'=>'activated',
        //     'username'=>'',
        //     'password'=>'',
        //     'token'=>'',
        //     'roles'=>'supervisor'
        // ]);
        // }
    }

    public static function connectionCheck()
    {

        if (!(empty(DB::connection()->getDatabaseName()))) {
            try {
                DB::connection()->getPdo();
                return [200, 'Pdo is connected'];
                // Database exists and connection is successful
            } catch (Exception $e) {
                // Database connection failed, likely indicating non-existence
                return [$e->getCode(), $e->getMessage()];
                // var_dump(DB::connection()->getPdo()->getAttribute(PDO::ATTR_CONNECTION_STATUS));
            }
        } else {
            return [404, 'database sirandu not exist'];
        }
    }

    public static function starter()
    {
        #check if connection success and database exist
        $conn = StarterController::connectionCheck();
        if ($conn[0] == 200) {
            #check if sirandu config exist
            if (Storage::disk('local')->exists('.starter/.sirandu.json')) {
                #get sirandu value and check if its value activated or not
                $json = Storage::disk('local')->get('.starter/.sirandu.json');

                if (!(empty($json))) {
                    $config = json_decode($json);
                    if ($config->status == 'disabled') {
                        return view('starter');
                    } elseif ($config->status == 'activated') {
                        return view('login');
                    }
                } else {
                    return view('starter');
                }
            }
            #if not exist show starter blade view
            else {
                return view('starter');
                // Storage::disk('local')->put('.starter/.sirandu.json',self::$config);
            }
        } else {
            return view('readme');
        }
    }

    public static function starterConfiguration(Request $request)
    {
        $request->validate([
            'username' => 'required|string|alpha_dash:ascii',
            'password' => 'required|string|alpha_dash:ascii',
            'email' => 'required|string|email'
        ]);

        $migrate = Artisan::call('migrate:fresh --force');

        if (Storage::disk('local')->exists('.starter/.sirandu.json')) {
            $webJson = json_encode([
                'status' => 'activated',
                'uid' => '',
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'email' => $request->input('email'),
                'token' => '',
                'roles' => 'owner',
                'table'=>''
            ]);
            Storage::disk('local')->put('.starter/.sirandu.json', $webJson);
        } else {
            Storage::disk('local')->put('.starter/.sirandu.json', self::$config);
        }
    }
}
