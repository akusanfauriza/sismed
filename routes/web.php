<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomePageController;

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

// Hompage
// Route::get(Menampilkan hompage)

// Menampilkan form login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Rute Login Role
// Rute untuk administrator
Route::middleware(['auth', 'role:administrator'])->group(function () {
    // Halaman Pasien
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create'); 
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/{id}/edit', [PasienController::class, 'edit'])->name('pasien.edit'); 
    Route::put('/pasien/{id}', [PasienController::class, 'update'])->name('pasien.update'); 
    Route::delete('/pasien/{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

    // Halaman Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create'); 
    Route::post('/pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/{id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit'); 
    Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update'); 
    Route::delete('/pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');
});

// Rute Untuk Role Dokter
Route::middleware(['auth', 'role:dokter'])->group(function () {
    // Halaman Antrian
    Route::get('/antrian', [AntrianController::class, 'index'])->name('antrian.index');
    Route::get('/antrian/create', [AntrianController::class, 'create'])->name('antrian.create'); 
    Route::post('/antrian', [AntrianController::class, 'store'])->name('antrian.store');
    Route::get('/antrian/{id}/edit', [AntrianController::class, 'edit'])->name('antrian.edit'); 
    Route::put('/antrian/{id}', [AntrianController::class, 'update'])->name('antrian.update'); 
    Route::delete('/antrian/{id}', [AntrianController::class, 'destroy'])->name('antrian.destroy');

    // Rekam Medis
    Route::get('rekam-medis', [RekamMedisController::class, 'index'])->name('rekam_medis.index');
    Route::get('rekam-medis/create', [RekamMedisController::class, 'create'])->name('rekam_medis.create');
    Route::post('rekam-medis', [RekamMedisController::class, 'store'])->name('rekam_medis.store');
    Route::get('rekam-medis/{rekamMedis}/edit', [RekamMedisController::class, 'edit'])->name('rekam_medis.edit');
    Route::put('rekam-medis/{rekamMedis}', [RekamMedisController::class, 'update'])->name('rekam_medis.update');
    Route::delete('rekam-medis/{rekamMedis}', [RekamMedisController::class, 'destroy'])->name('rekam_medis.destroy');
    
});

// Rute untuk apoteker
Route::middleware(['auth', 'role:apoteker'])->group(function () {
    // Halaman Obat
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index'); 
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit'); 
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update'); 
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy'); 
});