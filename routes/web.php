<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanPemeliharaanController;
use App\Http\Controllers\LaporanPengadaanController;
use App\Http\Controllers\LaporanPenyusutanController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\PenyusutanController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');

    // User
    Route::resource('user',UsersController::class);

    Route::resource('ruangan',RuanganController::class);
    Route::resource('supplier',SupplierController::class);
    Route::resource('kategori',KategoriController::class);
    Route::resource('barang',BarangController::class);
    Route::resource('pengadaan',PengadaanController::class);
    Route::resource('penyusutan',PenyusutanController::class);
    Route::resource('pemeliharaan',PemeliharaanController::class);


    //Laporan
    Route::get('laporan/pengadaans',[LaporanPengadaanController::class,'pengadaan'])->name('laporanPengadaan');
    Route::get('laporan pengadaan/cetak',[LaporanPengadaanController::class,'cetak_pdf'])->name('laporanPengadaan.cetakPdf');
    Route::get('laporan/pemeliharaans',[LaporanPemeliharaanController::class,'pemeliharaan'])->name('laporanPemeliharaan');
    Route::get('laporan pemeliharaan/cetak',[LaporanPemeliharaanController::class,'cetak_pdf'])->name('laporanPemeliharaan.cetakPdf');
    Route::get('laporan/penyusutans',[LaporanPenyusutanController::class,'penyusutan'])->name('laporanPenyusutan');
    Route::get('laporan penyusutan/cetak',[LaporanPenyusutanController::class,'cetak_pdf'])->name('laporanPenyusutan.cetakPdf');
});


