<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang benar
    protected $table = 'pasien';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_hp',
        'riwayat_penyakit',
    ];
}
