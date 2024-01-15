<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Galeri_Table;

class Galeri extends Controller
{
    public static function galeriPage()
    {
        $photo = Galeri::getData();
        return view('galeri',['images' => $photo]);
    }
    public static function getData()
    {
        return Galeri_Table::all();
    }
    public function uploadGaleri()
    {
        return view('uploadGaleri');
    }
}
