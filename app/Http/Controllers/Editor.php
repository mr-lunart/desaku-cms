<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Parsedown;

use App\Models\Artikel_Table;

class Editor extends Controller
{
    public function workbench()
    {
        return view('workbench');
    }
    public function editor()
    {
        return view('editor');
    }
}
