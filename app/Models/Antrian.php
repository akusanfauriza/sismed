<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $table = 'antrian';
    
    protected $fillable = [
        'id_pasien',
        'dokter_id',
        'status',
        'nomor_antrian',
        'waktu_antrian',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }

    public function dokter()
    {
        return $this->belongsTo(Pengguna::class, 'dokter_id');
    }
    
}
