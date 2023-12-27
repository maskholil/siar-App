<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\Suratcontroller;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login/new_login', [LoginController::class, 'authenticate']);

Route::get('/surat_masuk', [Suratcontroller::class, 'surat_masuk']);
Route::post('/surat_masuk/tambah',[SuratController::class, 'store']);
Route::get('/surat_masuk/{id}/edit',[SuratController::class, 'edit']);
Route::post('/surat_masuk/{id}/update',[SuratController::class, 'update']);
Route::post('/surat_masuk/{id}/hapus',[SuratController::class, 'hapus']);
Route::get('/surat.galery_surat_masuk', [Suratcontroller::class, 'galery']);

Route::get('/get_data/{id}',[Suratcontroller::class, 'get_data']);


Route::get('/rapat', [RapatController::class, 'index']);
Route::post('/rapat/tambah',[RapatController::class, 'store']);
Route::post('/rapat/{id}/update',[RapatController::class, 'update']);
