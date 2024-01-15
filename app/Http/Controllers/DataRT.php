<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PusatData;
use Illuminate\Support\Facades\Storage;
use Parsedown;

class DataRT extends Controller
{   
    protected $query;
    protected $organisasi;

    public function __construct(Request $request)
    {
        $this -> organisasi = PusatData::getDataOrganisasi();
    }
    public function dataRT ()
    {
        return view('dataRT',['organisasi' => $this->organisasi]);
    }
    public function databaru ()
    {
        return view('tambahDataRT');
    }
    public function visiBaru()
    {
        $Parsedown = new Parsedown();
        $Parsedown->setBreaksEnabled(true);

        $visi = Storage::disk('public')->get('visi/visi.md');
        $misi = Storage::disk('public')->get('visi/misi.md');
        // $visiConvert = $Parsedown->text($visi);
        // $misiConvert = $Parsedown->text($misi);

        return view('editVisi',['visi'=>$visi,'misi'=>$misi]);
    }

}
