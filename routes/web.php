<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AntarmukaController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangRusakController;
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


// Login
Route::get('/', [AntarmukaController::class, 'index']);
// Route::get('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/login', [AuthController::class, 'prosesLogin']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/adminDash', [AntarmukaController::class, 'adminDashboard']);
Route::get('/stafDash', [AntarmukaController::class, 'stafDashboard']);
Route::get('/KepItDash', [AntarmukaController::class, 'kepalaItDashboard']);

//Pegawai
Route::resource('/pegawai', PegawaiController::class);

// Stok-Barang
Route::get('stok-barang', [AntarmukaController::class, 'stokBarang']);

// Barang-Masuk
Route::resource('/barang-masuk', BarangMasukController::class);

// Barang-Rusak
Route::resource('/barang-rusak', BarangRusakController::class);

Route::get('/barang-dipinjam', function () {
    return view('barang/barang_dipinjam', ["title" => "Data Pegawai"]);
})->name('table');

Route::get('/barang-dikembalikan', function () {
    return view('barang/barang_dikembalikan', ["title" => "Data Pegawai"]);
})->name('table');