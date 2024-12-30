<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    public function run()
    {
        Pengguna::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'administrator',
            'nama_lengkap' => 'Admin Sismed',
            'email' => 'admin@example.com',
        ]);
    }
}
