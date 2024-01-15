<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use App\Http\Controllers\PemrosesanBitmap;
use App\Models\Artikel_Table;
use App\Models\Galeri_Table;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Parsedown;


use Illuminate\Http\Request;

class PusatData extends Controller
{
    protected $query;

    public function __construct()
    {
        // $this->query = Admin::all($columns = ['*']);
    }

    static function konversiMD(Request $request) {
        
        $Parsedown = new Parsedown();
        
        $Parsedown -> setBreaksEnabled(true);
        
        // Storage::disk('public')->put('article/file.md',$request->input('markdo'));
        // $markdown = Storage::disk('public')->get('article/file.md');

        echo $Parsedown->text($request->input('markdown'));
    }

    static function getDataOrganisasi()
    {
        return StrukturOrganisasi::all();
        // if(!($request->filled(['username','password']))){
        //     return redirect()->route('admin',['status'=>'failed']);
        // }
        // elseif($request->filled(['username','password'])){
        //     return Dashboard::dashboard();
        // }
        // elseif($request->filled(['username','password'])){
        //     return redirect()->route('dashboard');
        // }
        // return redirect()->route('admin');
    }

    static function getArtikelList()
    {
        return Artikel_Table::all();
        // if(!($request->filled(['username','password']))){
        //     return redirect()->route('admin',['status'=>'failed']);
        // }
        // elseif($request->filled(['username','password'])){
        //     return Dashboard::dashboard();
        // }
        // elseif($request->filled(['username','password'])){
        //     return redirect()->route('dashboard');
        // }
        // return redirect()->route('admin');
    }

    static function profilUpload(Request $request)
    {
        $imgSirandu = new PemrosesanBitmap($request->file('file'));
        $newImg = $imgSirandu->resize();
        ob_start();
        // Save the image as PNG to the output buffer
        imagepng($newImg);
        // Capture the output buffer content into a variable
        $imageData = ob_get_contents();
        ob_get_clean();

        echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '"/>';

        $file = base64_encode($imageData);
        $organisasi = new StrukturOrganisasi;
        $organisasi->nama = $request->input('nama');
        $organisasi->jabatan = $request->input('jabatan');
        $organisasi->save();
        if ($request->hasFile('file') == true) {
            // $path = $file->storeAs(
            //     'images/profil',
            //     'test.png',
            //     'public'
            // );
        }
    }

    public static function getLastGaleriList()
    {

        $lastCurrentID = Galeri_Table::latest('no')->first();
        return $lastCurrentID;
    }

    public static function galeriUpload(Request $request)
    {
        if ($request->hasFile('file') == true) {
            // get original filename 
            $fileName = $request->file('file')->getClientOriginalName();
            // define proses bitmap
            $picture = new PemrosesanBitmap($request->file('file'));
            // preproses bitmap
            $praproses = $picture -> preprocess($request->file('file'));

            $scaled = $picture -> resize();
            $thumbnail = $picture -> thumbnail();
         
            ob_start();
            // Save the image as PNG to the output buffer
            imagejpeg($thumbnail,null,50);
            // Capture the output buffer content into a variable
            $imageData = ob_get_contents();
            ob_get_clean();

            imagedestroy($scaled);
            imagedestroy($thumbnail);

            // echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '"/>';

            // Save processed image in public storage folder
            
            $lastId = PusatData::getLastGaleriList();
            $timestamp = strtotime('2023-09-11 14:30:00');
            $formattedDate = date('dmY', $timestamp);
            $fileUID = $lastId->no + 1 ."GL".$formattedDate;

            $user = new Galeri_Table;
            $user->uuid = $fileUID;
            $user->nama = $fileName;
            $user->lokasi = "images/galeri/" .$fileUID. ".webp";
            $user->tanggal = date("Y-m-d",time());
            $user->thumbnail = base64_encode($imageData);
            $user->save();
            Storage::disk('public')->put('images/galeri/foto.png', $imageData);
            return redirect()->route('galeri');
        }
    }

    public function addRT(Request $request)
    {
        $organisasi = new StrukturOrganisasi;
        $organisasi->nama = $request->input('nama');
        $organisasi->jabatan = $request->input('jabatan');
        $organisasi->save();
        return redirect()->route('pusatdata');
    }

    public function deletedRT(Request $request)
    {
        $person = $request->get('person');
        print($person);
        StrukturOrganisasi::destroy($person);
        return redirect()->route('pusatdata');
    }

    public function visiUpload(Request $request)
    {
        $visi = ($request->input('visi'));
        $misi = ($request->input('misi'));
        if ($visi == NULL) {
            $visi = "";
        }
        if ($misi == NULL) {
            $misi = "";
        }
        Storage::disk('public')->put('visi/visi.md', $visi);
        Storage::disk('public')->put('visi/misi.md', $misi);
        return redirect()->route('pusatdata');
    }
}
