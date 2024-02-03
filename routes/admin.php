<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\PusatData;
use App\Http\Controllers\Editor;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DataRT;
use App\Http\Controllers\Galeri;
use App\Http\Controllers\Manajer\ManajerController;
use App\Http\Controllers\Manajer\ShowManajerPage;
use App\Http\Controllers\Starter\StarterController;

Route::middleware(['guest'])->group(function () {
    Route::get('/login',[StarterController::class,'starter'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login');
    Route::post('/starter',[StarterController::class,'starterConfiguration'])->name('starter');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');
    Route::get('/editor', [Editor::class,'workbench'])->name('editor');

    Route::get('/manajer',[ShowManajerPage::class,'manajerAdmin'])->name('manajer');
    Route::get('/manajer/insertadmin',[ShowManajerPage::class,'manajerInsertAdmin'])->name('manajerInsert');
    Route::post('/manajer/createadmin',[ManajerController::class,'createAdmin'])->name('manajerCreate');
    
    // Route::get('/artikel/baru',[Artikel::class,'artikelBaru'])->name('artikelBaru');
    Route::get('/pusatdata', [DataRT::class,'dataRT'])->name('pusatdata');
    Route::get('/pusatdata/databaru', [DataRT::class,'databaru'])->name('databaru');
    Route::get('/pusatdata/visi', [DataRT::class,'visiBaru'])->name('visibaru');
    
    Route::get('/galeri', [Galeri::class,'galeriPage'])->name('galeri');
    Route::get('/galeri/upload', [Galeri::class,'uploadGaleri'])->name('uploadGaleri');
    Route::get('/pusatdata/database/rt/deleted', [PusatData::class,'deletedRT'])->name('deletedRT');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});


?>