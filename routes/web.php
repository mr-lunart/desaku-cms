<?php

use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PusatData;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'showHome'])->name('home');

// Route::post('/test',[Dashboard::class,'showdata'])->name('test');

Route::controller(PusatData::class)->group(function (){
    Route::post('/admin/pusatdata/konversi','konversiMD')->name('konversiMD');
    Route::post('/admin/pusatdata/database/upload/profil','addRT')->name('profilUpload');
    Route::post('/admin/pusatdata/database/upload/visi','visiUpload')->name('visiUpload');
    Route::post('/admin/pusatdata/database/upload/galeri','galeriUpload')->name('galeriUpload');
});