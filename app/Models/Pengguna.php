<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pengguna extends Authenticatable
{
    use Notifiable;

    protected $table = 'pengguna'; // Tabel yang digunakan

    protected $fillable = [
        'username',
        'password',
        'role',
        'nama_lengkap',
        'email',
        'no_hp',
    ];
}
