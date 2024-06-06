<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DPegawaiController;
use App\Http\Controllers\DKegiatanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\UserKegiatanController;
use App\Http\Controllers\DaftarPesertaController;

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
    return view('Admin.Dashboard.index');
});

Route::get('/daftar', function () {
    return view('User.pendaftaran');
});

Route::prefix('dashboard')->group(
    function(){
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/datapegawai', DPegawaiController::class);
        Route::resource('/datakegiatan', DKegiatanController::class);
        Route::get('/datapeserta', [DaftarPesertaController::class, 'show'])->name('daftarpeserta.show');
        Route::get('/daftarpeserta/{id}', [DaftarPesertaController::class, 'index'])->name('daftarpeserta.index');
        Route::resource('/laporan', LaporanController::class);
    }
);



Route::get('TJS/kegiatan', [UserKegiatanController::class, 'index'])->name('User.index');
Route::get('TJS/kegiatan/{id}/daftar', [PendaftaranController::class, 'create'])->name('User.create');
Route::post('TJS/kegiatan/{id}/daftar', [PendaftaranController::class, 'store'])->name('User.store');
Route::get('TJS/kegiatan/sukses', function () {return view('User.sukses');})->name('sukses');
Route::get('TJS/bukti-pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('bukti-daftar.show');

// Route untuk cetak bukti
Route::get('/cetak-bukti', [PendaftaranController::class, 'cetak'])->name('cetak_bukti');
Route::get('/daftarpeserta/{id}', [DaftarPesertaController::class, 'index'])->name('daftarpeserta.index');
Route::get('/dokumen{file}', [PendaftaranController::class, 'viewDokumen'])->name('dokumen');




