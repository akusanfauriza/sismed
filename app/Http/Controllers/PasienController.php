<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Menampilkan daftar pasien.
     */
    public function index()
    {
        // Ambil semua data pasien dari tabel
        $dataPasien = Pasien::all();

        // Kirim data ke view
        return view('pasien.index', compact('dataPasien'));
    }

    /**
     * Menampilkan halaman tambah pasien.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Menyimpan data pasien baru.
     */
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

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail pasien.
     */
    public function show($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Kirim data ke view
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Menampilkan halaman edit pasien.
     */
    public function edit($id)
    {
        // Ambil data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Kirim data ke view
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Memperbarui data pasien.
     */
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

    /**
     * Menghapus data pasien.
     */
    public function destroy($id)
    {
        // Cari data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Hapus data
        $pasien->delete();

        // Redirect ke halaman daftar pasien dengan pesan sukses
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
