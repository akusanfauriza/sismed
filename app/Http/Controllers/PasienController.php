<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data obat dari tabel
        $dataPasien = Pasien::all();

        // Kirim data ke view
        return view('pasien.index', compact('dataPasien'));
    }

    // Create Data Pasien
    public function create()
    {
        return view('pasien.create');
    }

    // Meyimpan Data Pasien
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:15',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        // Simpan data ke database
        Pasien::create($request->all());

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // Edit Data Pasien
    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Kirim data ke view
        return view('pasien.edit', compact('pasien'));
    }


    // Update Data Pasien
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'no_hp' => 'nullable|string|max:15',
            'riwayat_penyakit' => 'nullable|string',
        ]);

        // Temukan data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Update data pasien
        $pasien->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui.');
    }


    // Hapus Data Pasien
    public function destroy($id)
    {
        // Cari data obat berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Hapus data
        $pasien->delete();

        // Redirect ke halaman daftar pasien dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
