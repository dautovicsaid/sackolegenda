<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\KategorijeController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\KorisnikController;
use App\Http\Controllers\BibliotekarController;
use App\Http\Controllers\TipkorisnikaController;
use App\Http\Controllers\UcenikController;
use App\Http\Controllers\ZanroviController;
use App\Http\Controllers\IzdavacController;
use App\Http\Controllers\PismoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
})->name("dashboard");

Route::get('/settings', function () {return view('settings.index');})->name("settings");


//Povez


Route::get('/settingsPovez', [PovezController::class,'index'])->name("povez");

Route::get('/createPovez', [PovezController::class,'create'])->name("povez.create");

Route::post('/storePovez',[PovezController::class,'store'] )->name("povez.store");

Route::get('/deletePovez/{id}', [PovezController::class,'delete'] )->name("povez.delete");

Route::get('/editPovez/{id}', [PovezController::class,'edit'])->name("povez.edit");

Route::post('/updatePovez/{id}', [PovezController::class,'update'])->name("povez.update");



//kategorije


Route::get('/settingsKategorije', [KategorijeController::class,'index'])->name("kategorije");

Route::get('/createKategorije', [KategorijeController::class,'create'])->name("kategorije.create");

Route::post('/storeKategorije',[KategorijeController::class,'store'] )->name("kategorije.store");

Route::get('/deleteKategorije/{id}', [KategorijeController::class,'delete'] )->name("kategorije.delete");

Route::get('/editKategorije/{id}', [KategorijeController::class,'edit'])->name("kategorije.edit");

Route::post('/updateKategorije/{id}', [KategorijeController::class,'update'])->name("kategorije.update");



//format


Route::get('/settingsFormat',[FormatController::class,'index'])->name("format");

Route::get('/createFormat',[FormatController::class,'create'])->name("format.create");

Route::post('/storeFormat',[FormatController::class,'store'])->name("format.store");

Route::get('/editFormat/{id}',[FormatController::class,'edit'])->name("format.edit");

Route::post('/updateFormat/{id}', [FormatController::class,'update'])->name("format.update");

Route::get('/deleteFormat/{id}',[FormatController::class,'delete'])->name("format.delete");


//Ucenici

/*

Route::get('/Ucenici',[UceniciController::class,'index'])->name("ucenici");

Route::get('/createUcenici',[UceniciController::class,'create'])->name("ucenici.create");

Route::post('/storeUcenici',[UceniciController::class,'store'])->name("ucenici.store");

Route::get('/editUcenici/{id}',[UceniciController::class,'edit'])->name("ucenici.edit");

Route::post('/updateUcenici/{id}', [UceniciController::class,'update'])->name("ucenici.update");

Route::get('/deleteUcenici/{id}',[UceniciController::class,'delete'])->name("ucenici.delete");

Route::get('/infoUcenici/{id}',[UceniciController::class,'read'])->name("ucenici.info");

// Controleri i modeli i migration za Ucenici nisu uradjeni!!!

Route::get('/Biblitekari',[BiblitekariController::class,'index'])->name("bibliotekari");

Route::get('/createBiblitekari',[BiblitekariController::class,'create'])->name("bibliotekari.create");

Route::post('/storeBiblitekari',[BiblitekariController::class,'store'])->name("bibliotekari.store");

Route::get('/editBiblitekari/{id}',[BiblitekariController::class,'edit'])->name("bibliotekari.edit");

Route::post('/updateBiblitekari/{id}', [BiblitekariController::class,'update'])->name("bibliotekari.update");

Route::get('/deleteBiblitekari/{id}',[BiblitekariController::class,'delete'])->name("bibliotekari.delete");

Route::get('/infoBiblitekari/{id}',[BiblitekariController::class,'read'])->name("bibliotekari.info");

*/

//Zanrovi

Route::get('/settingsZanrovi',[ZanroviController::class,'index'])->name("zanrovi");

Route::get('/createZanrovi',[ZanroviController::class,'create'])->name("zanrovi.create");

Route::post('/storeZanrovi',[ZanroviController::class,'store'])->name("zanrovi.store");

Route::get('/editZanrovi/{id}',[ZanroviController::class,'edit'])->name("zanrovi.edit");

Route::post('/updateZanrovi/{id}', [ZanroviController::class,'update'])->name("zanrovi.update");

Route::get('/deleteZanrovi/{id}',[ZanroviController::class,'delete'])->name("zanrovi.delete");


//Izdavac


Route::get('/settingsIzdavac',[IzdavacController::class,'index'])->name("izdavac");

Route::get('/createIzdavac',[IzdavacController::class,'create'])->name("izdavac.create");

Route::post('/storeIzdavac',[IzdavacController::class,'store'])->name("izdavac.store");

Route::get('/editIzdavac/{id}',[IzdavacController::class,'edit'])->name("izdavac.edit");

Route::post('/updateIzdavac/{id}', [IzdavacController::class,'update'])->name("izdavac.update");

Route::get('/deleteIzdavac/{id}',[IzdavacController::class,'delete'])->name("izdavac.delete");

//Ucenik

Route::resource('ucenik',UcenikController::class);

//Bibliotekar

Route::resource('bibliotekar',BibliotekarController::class);

//Pismo

Route::resource('pismo',PismoController::class);