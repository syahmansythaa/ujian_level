<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukSayaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;

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


    
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('data_produk', [ProdukSayaController::class, 'index'])->name('data_produk');
Route::get('data_produk/tambah',[ProdukSayaController::class,'tambah'])->name('data_produk.tambah');
Route::post('data_produk/aksi_tambah',[ProdukSayaController::class,'aksi_tambah'])->name('data_produk.aksi_tambah');
Route::get('data_produk/edit/{id}',[ProdukSayaController::class,'edit'])->name('data_produk.edit');
Route::post('data_produk/aksi_edit/{id}',[ProdukSayaController::class,'aksi_edit'])->name('data_produk.aksi_edit');
Route::post('data_produk/aksi_hapus/{id}',[ProdukSayaController::class,'aksi_hapus'])->name('data_produk.aksi_hapus');
Route::get('kategori/tambah',[KategoriController::class,'tambah'])->name('kategori.tambah');
Route::post('kategori/aksi_tambah',[KategoriController::class,'aksi_tambah'])->name('kategori.aksi_tambah');
Route::get('kategori/edit/{id}',[KategoriController::class,'edit'])->name('kategori.edit');
Route::post('kategori/aksi_edit/{id}',[KategoriController::class,'aksi_edit'])->name('kategori.aksi_edit');
