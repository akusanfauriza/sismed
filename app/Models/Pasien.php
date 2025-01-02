<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasien extends Model
{
    use HasFactory;

    // Nama tabel
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

    // Non-auto increment
    public $incrementing = false;
    protected $keyType = 'string';

    // Membuat ID kustom secara otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            do {
                $id = strtoupper(Str::random(4)); // Kombinasi huruf kapital acak
            } while (self::where('id', $id)->exists());

            $model->id = $model->id ?? $id;
        });
    }
}
