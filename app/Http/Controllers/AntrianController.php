<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data antrian dengan relasi pasien dan dokter
        $antrian = Antrian::with(['pasien', 'dokter'])->get();

        // Kirim data ke view
        return view('antrian.index', compact('antrian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil data pasien dan dokter
        $pasien = Pasien::all(); // Semua pasien
        $dokter = Pengguna::where('role', 'dokter')->get(); // Pengguna dengan role dokter

        // Kirim data ke view
        return view('antrian.create', compact('pasien', 'dokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:pengguna,id',
            'status' => 'required|in:menunggu,diproses,selesai',
            'nomor_antrian' => 'required|string|max:10',
            'waktu_antrian' => 'nullable|date',
        ]);

        // Simpan data ke tabel antrian
        Antrian::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data antrian berdasarkan ID
        $antrian = Antrian::findOrFail($id);

        // Ambil data pasien dan dokter untuk dropdown
        $pasien = Pasien::all();
        $dokter = Pengguna::where('role', 'dokter')->get();

        // Kirim data ke view
        return view('antrian.edit', compact('antrian', 'pasien', 'dokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:pengguna,id',
            'status' => 'required|in:menunggu,diproses,selesai',
            'nomor_antrian' => 'required|string|max:10',
            'waktu_antrian' => 'nullable|date',
        ]);

        // Temukan data antrian
        $antrian = Antrian::findOrFail($id);

        // Update data antrian
        $antrian->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data antrian
        $antrian = Antrian::findOrFail($id);

        // Hapus data
        $antrian->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Antrian berhasil dihapus.');
    }
}