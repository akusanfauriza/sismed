<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RekamMedisController;

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

// Halaman Obat
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index'); // Menampilkan daftar obat
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create'); // Form tambah obat
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store'); // Simpan obat baru
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit'); // Form edit obat
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update'); // Update obat
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy'); //Delete obat

// Halaman Pasien
Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index'); // Menampilkan daftar Pasien
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create'); // Form tambah pasien
Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store'); // Simpan pasien baru
Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit'); // Form edit pasien
Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update'); // Update pasien
Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy'); // Delete pasien

// Halaman Pasien
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index'); // Menampilkan daftar Pasien
Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create'); // Form tambah pasien
Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store'); // Simpan pasien baru
Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit'); // Form edit pasien
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update'); // Update pasien
Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy'); // Delete pasien


// Halaman Antrian
Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index'); // Menampilkan daftar Pasien
Route::get('/antrian/create', [AntrianController::class, 'create'])->name('antrian.create'); // Form tambah pasien
Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store'); // Simpan pasien baru
Route::get('/antrian/{id}/edit', [AntrianController::class, 'edit'])->name('antrian.edit'); // Form edit pasien
Route::put('/antrian/{id}', [AntrianController::class, 'update'])->name('antrian.update'); // Update pasien
Route::delete('/antrian/{id}', [AntrianController::class, 'destroy'])->name('antrian.destroy'); // Delete pasien

// Halaman Rekam Medis
Route::get('rekam-medis', [RekamMedisController::class, 'index'])->name('rekam_medis.index');
    Route::get('rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam_medis.create');
    Route::post('rekam-medis', [RekamMedisController::class, 'store'])->name('rekam_medis.store');
    Route::get('rekam-medis/{rekamMedis}/edit', [RekamMedisController::class, 'edit'])->name('rekam_medis.edit');
    Route::put('rekam-medis/{rekamMedis}', [RekamMedisController::class, 'update'])->name('rekam_medis.update');
    Route::delete('rekam-medis/{rekamMedis}', [RekamMedisController::class, 'destroy'])->name('rekam_medis.destroy');