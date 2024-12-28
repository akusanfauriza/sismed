<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Pasien;
use App\Models\Pengguna;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data antrian dengan relasi pasien dan dokter
        $dataAntrian = Antrian::with(['pasien', 'dokter'])->get();

        // Kirim data ke view
        return view('antrian.index', compact('dataAntrian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil daftar pasien dan dokter
        $dataPasien = Pasien::all();
        $dataDokter = Pengguna::where('role', 'dokter')->get();

        // Kirim data ke view form create
        return view('antrian.create', compact('dataPasien', 'dataDokter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Simpan data ke tabel antrian
        Antrian::create($request->all());

        // Redirect ke halaman daftar antrian dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Data antrian berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari data antrian berdasarkan ID
        $antrian = Antrian::findOrFail($id);

        // Ambil daftar pasien dan dokter
        $dataPasien = Pasien::all();
        $dataDokter = Pengguna::where('role', 'dokter')->get();

        // Kirim data ke view edit
        return view('antrian.edit', compact('antrian', 'dataPasien', 'dataDokter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Cari data antrian berdasarkan ID
        $antrian = Antrian::findOrFail($id);

        // Update data
        $antrian->update($request->all());

        // Redirect ke halaman daftar antrian dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Data antrian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data antrian berdasarkan ID
        $antrian = Antrian::findOrFail($id);

        // Hapus data
        $antrian->delete();

        // Redirect ke halaman daftar antrian dengan pesan sukses
        return redirect()->route('antrian.index')->with('success', 'Data antrian berhasil dihapus.');
    }
}
