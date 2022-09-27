<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LamanController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function () {
  Route::get('/masuk', [LamanController::class, 'masukTampil'])->name('masuk.tampil');
  Route::post('/masuk', [LamanController::class, 'masukProses'])->name('masuk.proses');
  Route::get('/bantuan', [LamanController::class, 'bantuan'])->name('bantuan');
});

Route::middleware(['login'])->group(function () {
  Route::get('/', [LamanController::class, 'beranda'])->name('beranda');
  Route::post('/checkout', [LamanController::class, 'checkoutIndex'])->name('checkout.index');
  Route::post('/checkout/process', [LamanController::class, 'checkoutStore'])->name('checkout.store');

  Route::prefix('/barang')->group(function () {
    Route::get('/', [BarangController::class, 'barangIndex'])->name('barang.index');
    Route::post('/', [BarangController::class, 'barangStore'])->name('barang.store');
    Route::patch('/{barang}', [BarangController::class, 'barangUpdate'])->name('barang.update');
    Route::delete('/{barang}', [BarangController::class, 'barangDestroy'])->name('barang.destroy');
  });

  Route::prefix('/pengguna')->group(function () {
    Route::get('/', [PenggunaController::class, 'penggunaIndex'])->name('pengguna.index');
    Route::post('/', [PenggunaController::class, 'penggunaStore'])->name('pengguna.store');
    Route::patch('/{pengguna}', [PenggunaController::class, 'penggunaUpdate'])->name('pengguna.update');
    Route::delete('/{pengguna}', [PenggunaController::class, 'penggunaDestroy'])->name('pengguna.destroy');
  });

  Route::prefix('/profil')->group(function () {
    Route::get('/', [ProfilController::class, 'profilIndex'])->name('profil.index');
    Route::patch('/{profil}', [ProfilController::class, 'profilUpdate'])->name('profil.update');
  });

  Route::get('/riwayat', [LamanController::class, 'riwayat'])->name('riwayat');
  Route::get('/petunjuk', [LamanController::class, 'petunjuk'])->name('petunjuk');
  Route::get('/unduh/{file}/{name?}', [LamanController::class, 'unduh'])->name('unduh');
  Route::post('/keluar', [LamanController::class, 'keluar'])->name('keluar');
});

Route::get('/coba', [LamanController::class, 'coba']);
