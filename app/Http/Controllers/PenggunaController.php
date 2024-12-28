<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data pengguna dari tabel
        $dataPengguna = Pengguna::all();

        // Kirim data ke view
        return view('pengguna.index', compact('dataPengguna'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|',
            'password' => 'required|string|min:6',
            'role' => 'required|in:administrator,dokter,apoteker',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'no_hp' => 'nullable|string|max:15',
        ]);

        Pengguna::create($request->all());

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('pengguna.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        return view('pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|',
            'password' => 'nullable|string|min:6',
            'role' => 'required|in:administrator,dokter,apoteker',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|',
            'no_hp' => 'nullable|string|',
        ]);

        $pengguna = Pengguna::findOrFail($id);

        $pengguna->update($request->all());

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);

        $pengguna->delete();

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
