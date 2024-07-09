<?php

use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
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



Route::get('/', [LoginController::class, 'halamanlogin'])->name('login');
Route::post('/postlogin', [LoginController::class, 'Postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('/datapegawai', DPegawaiController::class);
        Route::resource('/datakegiatan', DKegiatanController::class);
        Route::get('/datapeserta', [DaftarPesertaController::class, 'show'])->name('daftarpeserta.show');
        Route::get('/daftarpeserta/{id}', [DaftarPesertaController::class, 'index'])->name('daftarpeserta.index');
        Route::resource('/laporan', LaporanController::class);
        Route::get('/laporan/{id}/print', [LaporanController::class, 'print'])->name('laporan.print');
        Route::get('/laporan/{id}/excel', [LaporanController::class, 'export_excel'])->name('print.excel');
    });
});





// Route::prefix('dashboard')->group(
//     function(){
//         Route::get('/', [AdminController::class, 'index'])->name('dashboard');
//         Route::resource('/datapegawai', DPegawaiController::class);
//         Route::resource('/datakegiatan', DKegiatanController::class);
//         Route::get('/datapeserta', [DaftarPesertaController::class, 'show'])->name('daftarpeserta.show');
//         Route::get('/daftarpeserta/{id}', [DaftarPesertaController::class, 'index'])->name('daftarpeserta.index');
//         Route::resource('/laporan', LaporanController::class);
//         Route::get('/laporan/{id}/print', [LaporanController::class, 'print'])->name('laporan.print');
//     }
// );


//User Side - Kegiatan 
Route::get('TJS/kegiatan', [UserKegiatanController::class, 'index'])->name('User.index');
Route::get('TJS/kegiatan/{id}/daftar', [PendaftaranController::class, 'create'])->name('User.create');
Route::post('TJS/kegiatan/{id}/daftar', [PendaftaranController::class, 'store'])->name('User.store');
Route::get('TJS/kegiatan/sukses', [PendaftaranController::class, 'showSuccess'])->name('sukses');
// Route::get('TJS/bukti-daftar($id)', [PendaftaranController::class, 'print'])->name('bukti-daftar.print');
Route::get('TJS/bukti-pendaftaran/{id}', [PendaftaranController::class, 'show'])->name('bukti-daftar.show');

// Route untuk cetak bukti
Route::get('/daftarpeserta/{id}', [DaftarPesertaController::class, 'index'])->name('daftarpeserta.index');
Route::get('/kelolapeserta/{id}', [DaftarPesertaController::class, 'kelolapeserta'])->name('kelolapeserta');
Route::get('/cetakdaftarpeserta', [DaftarPesertaController::class, 'reportpdf']);
Route::get('/dokumen{file}', [PendaftaranController::class, 'viewDokumen'])->name('dokumen');

Route::get('/koneksi', function () {
    return view('cek_koneksi');
});




