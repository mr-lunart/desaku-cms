<?php

namespace App\Http\Controllers\Starter;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StarterController extends Controller
{
    // protected $disk;

    public function __construct(Request $request)
    {
        Storage::disk('local')->makeDirectory('starter');
    }

    public function starter(Request $request)
    {
        if(Storage::disk('local')->exists('starter') ){
           echo "yes folder exist";
           if(Storage::disk('local')->exists('starter/sirandu.json') ){
            return "yes file exist";
           }
           else {
            return "no file not exist";
           }

        }
        else {
            return "no folder not exist";
        }
        
        // Storage::disk('local')->put('starter/example.txt', 'Contents');
    }
}
