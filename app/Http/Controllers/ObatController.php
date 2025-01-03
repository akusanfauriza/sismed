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

        // Simpan data ke tabel obat
        Obat::create($request->all());

        // Redirect ke halaman daftar obat dengan pesan sukses
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil ditambahkan.');
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
    public function edit($id)
    {
        // Cari data obat berdasarkan ID
        $obat = Obat::findOrFail($id);

        // Kirim data obat ke view edit
        return view('obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        // Cari data obat berdasarkan ID
        $obat = Obat::findOrFail($id);

        // Update data
        $obat->update($request->all());

        // Redirect ke halaman daftar obat dengan pesan sukses
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data obat berdasarkan ID
        $obat = Obat::findOrFail($id);

        // Hapus data
        $obat->delete();

        // Redirect ke halaman daftar obat dengan pesan sukses
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus.');
    }

}
