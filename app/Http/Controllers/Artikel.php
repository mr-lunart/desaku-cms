<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Parsedown;

use App\Models\Artikel_Table;

class Artikel extends Controller
{
    public static function artikelBoard()
    {
        $artikel = PusatData::getArtikelList();
        return view('artikel',['listArtikel'=>$artikel]);
    }
    public static function artikelBaru(Request $request)
    {
        return view('editor');
    }
}
