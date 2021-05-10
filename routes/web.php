<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PovezController;
use App\Http\Controllers\KategorijeController;

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
Route::get('/format',[FormatController::class,'index'])->name("format");

Route::get('/format-create',[FormatController::class,'create'])->name("format.create");

Route::post('/format-save',[FormatController::class,'store'])->name("format.save");

Route::get('/format-edit/{id}',[FormatController::class,'edit'])->name("format.edit");

Route::post('/format-update/{id}', [FormatController::class,'update'])->name("format.update");

Route::get('/format-delete/{id}',[FormatController::class,'delete'])->name("format.delete");
