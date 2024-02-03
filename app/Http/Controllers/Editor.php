<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Parsedown;

use App\Models\Artikel_Table;

class Editor extends Controller
{
    public static function workbench()
    {
        return view('workbench');
    }
    public static function artikelBaru(Request $request)
    {
        return view('editor');
    }
}
