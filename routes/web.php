<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IsiController;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
});
//isi
Route::get('/berita',[ArtikelController::class,'berita']);
//pisang
Route::get('/pisang',[IsiController::class,'isi']);
Route::post('/pisang/store', [IsiController::class,'store']);
//bola

Route::get('/bola',[IsiController::class,'bola']);
Route::post('/bola/store', [IsiController::class,'komenbola']);


//login
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postlogin']);
Route::get('/logout',[AuthController::class,'logout']);


//admin

Route::get('/artikel',[ArtikelController::class,'artikel'])->middleware('auth');
Route::get('/artikel/tambah', [ArtikelController::class,'create'])->middleware('auth');
Route::post('/artikel/store', [ArtikelController::class,'store'])->middleware('auth');
Route::get('/artikel/edit/{id}', [ArtikelController::class,'edit'])->middleware('auth');
Route::put('/artikel/update/{id}', [ArtikelController::class,'update'])->middleware('auth');
Route::get('/artikel/destroy/{id}', [ArtikelController::class,'destroy'])->middleware('auth');
