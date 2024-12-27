<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data obat dari tabel
        $dataObat = Obat::all();

        // Kirim data ke view
        return view('obat.index', compact('dataObat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    // Simpan data obat ke database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'jenis_obat' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|integer|min:0',
            'keterangan' => 'nullable|string',
        ]);

        // Simpan data ke database
        Obat::create([
            'nama_obat' => $request->nama_obat,
            'jenis_obat' => $request->jenis_obat,
            'dosis' => $request->dosis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('obat.create')->with('success', 'Data obat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
