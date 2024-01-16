<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Artikel;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataRT;
use App\Http\Controllers\Galeri;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Login;
use App\Http\Controllers\PusatData;
use Illuminate\Notifications\Action;
use PhpParser\Node\Stmt\Return_;

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

Route::get('/admin', function () {
    return view('login');
})->name('admin');

Route::match(['GET', 'POST'], '/login', function (Request $request, AuthController $authController) {

    switch ($request->method()) {
        case 'POST':
            return app()->call([$authController::class,'login']);

        case 'GET':
            return redirect()->route('admin');

        default:
            return redirect()->route('admin',['status'=>'failed']);
    }
})->name('login');

// Route::get('/', function () {
//     return view('welcome');
// })->name('root');



// Route::post('/test',[Dashboard::class,'showdata'])->name('test');

// Route::controller(PusatData::class)->group(function (){
//     Route::post('/admin/pusatdata/konversi','konversiMD')->name('konversiMD');
//     Route::post('/admin/pusatdata/database/upload/profil','addRT')->name('profilUpload');
//     Route::post('/admin/pusatdata/database/upload/visi','visiUpload')->name('visiUpload');
//     Route::post('/admin/pusatdata/database/upload/galeri','galeriUpload')->name('galeriUpload');
// });

// Route::middleware(['verify'])->group(function () {
    
//     Route::get('/admin/artikel/baru',[Artikel::class,'artikelBaru'])->name('artikelBaru');
//     Route::get('/admin/pusatdata', [DataRT::class,'dataRT'])->name('pusatdata');
//     Route::get('/admin/pusatdata/databaru', [DataRT::class,'databaru'])->name('databaru');
//     Route::get('/admin/pusatdata/visi', [DataRT::class,'visiBaru'])->name('visibaru');
//     Route::get('/admin/artikel', [Artikel::class,'artikelBoard'])->name('artikelBoard');
//     Route::get('/admin/galeri', [Galeri::class,'galeriPage'])->name('galeri');
//     Route::get('/admin/galeri/upload', [Galeri::class,'uploadGaleri'])->name('uploadGaleri');
//     Route::get('/admin/pusatdata/database/rt/deleted', [PusatData::class,'deletedRT'])->name('deletedRT');

// });
