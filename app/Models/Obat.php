<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    // Tentukan nama tabel yang benar
    protected $table = 'obat';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nama_obat',
        'jenis_obat',
        'dosis',
        'stok',
        'harga',
        'keterangan',
    ];
}
