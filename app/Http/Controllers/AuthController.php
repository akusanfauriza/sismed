<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('/login.index');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password');

        // Mencari pengguna berdasarkan username
        $user = Pengguna::where('username', $credentials['username'])->first();

        // Jika pengguna ditemukan dan password sesuai
        if ($user && $user->password === $credentials['password']) {
            // Login pengguna secara manual
            Auth::login($user);

            // Arahkan pengguna sesuai dengan perannya
            if ($user->role === 'administrator') {
                return redirect()->route('pengguna.index');
            } elseif ($user->role === 'dokter') {
                return redirect()->route('rekam_medis.index');
            } elseif ($user->role === 'apoteker') {
                return redirect()->route('obat.index');
            }
        }

        // Jika login gagal
        return back()->withErrors(['login_error' => 'Username atau password salah.']);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}