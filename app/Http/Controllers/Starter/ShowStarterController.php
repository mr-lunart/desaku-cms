<?php

namespace App\Http\Controllers\Starter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowStarterController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

}
