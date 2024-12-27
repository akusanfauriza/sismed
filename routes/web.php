<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

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