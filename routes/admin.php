<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\PusatData;
use App\Http\Controllers\Artikel;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataRT;
use App\Http\Controllers\Galeri;

Route::match(['GET', 'POST'], '/login', function (Request $request) {

    switch ($request->method()) {
        case 'POST':
            return app()->call([AuthController::class,'login']);

        case 'GET':
            return view('login');

        default:
            return redirect()->route('admin',['status'=>'failed']);
    }
})->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');
    Route::get('/manajer',[Dashboard::class,'dashboard'])->name('manajer');
    Route::get('/artikel/baru',[Artikel::class,'artikelBaru'])->name('artikelBaru');
    Route::get('/pusatdata', [DataRT::class,'dataRT'])->name('pusatdata');
    Route::get('/pusatdata/databaru', [DataRT::class,'databaru'])->name('databaru');
    Route::get('/pusatdata/visi', [DataRT::class,'visiBaru'])->name('visibaru');
    Route::get('/artikel', [Artikel::class,'artikelBoard'])->name('artikelBoard');
    Route::get('/galeri', [Galeri::class,'galeriPage'])->name('galeri');
    Route::get('/galeri/upload', [Galeri::class,'uploadGaleri'])->name('uploadGaleri');
    Route::get('/pusatdata/database/rt/deleted', [PusatData::class,'deletedRT'])->name('deletedRT');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});


?>