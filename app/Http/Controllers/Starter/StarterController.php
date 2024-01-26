<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Exception;
use Illuminate\Support\Facades\Hash;

class StarterController extends Controller
{
    public static $config = [
        'status' => 'disabled'
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
                    
                    Storage::disk('local')->put('.starter/.sirandu.json', self::$config);
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


        try {
            Artisan::call('migrate:fresh --force');
        } catch (Exception $e) {
            $except = explode(':', $e->getMessage());
            return back()->withErrors([
                'message' => $except[0] . $except[1],
                'guide' => 'Please fill the form and submit again'
            ]);
        }

        try {
            Admin::factory()->create([
                'no' => 0,
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'roles' => 'administrator'
            ]);

        } catch (Exception $e) {
            $except = explode(':', $e->getMessage());
            return back()->withErrors([
                'message' => $except[0] . $except[1],
                'guide' => 'Please fill the form and submit again'
            ]);
        }

        $webJson = json_encode([
            'status' => 'activated',
            'uid' => '',
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
            'token' => '',
            'roles' => 'owner',
        ]);
        Storage::disk('local')->put('.starter/.sirandu.json', $webJson);
        return redirect()->route('login');
    }
}
