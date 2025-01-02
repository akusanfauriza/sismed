<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Pengguna;
use App\Models\Obat;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with('pasien', 'dokter', 'obat')->get();
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Pengguna::where('role', 'dokter')->get();
        $obat = Obat::all();
        return view('rekam_medis.create', compact('pasien', 'dokter', 'obat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'diagnosa' => 'required',
            'id_obat' => 'required',
            'tanggal_periksa' => 'required|date',
        ]);

        RekamMedis::create($request->all());
        return redirect()->route('rekam_medis.index')->with('success', 'Rekam Medis berhasil ditambahkan.');
    }

    public function edit(RekamMedis $rekamMedis)
    {
        $pasien = Pasien::all();
        $dokter = Pengguna::where('role', 'dokter')->get();
        $obat = Obat::all();
        return view('rekam_medis.edit', compact('rekamMedis', 'pasien', 'dokter', 'obat'));
    }

    public function update(Request $request, RekamMedis $rekamMedis)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'diagnosa' => 'required',
            'id_obat' => 'required',
            'tanggal_periksa' => 'required|date',
        ]);

        $rekamMedis->update($request->all());
        return redirect()->route('rekam_medis.index')->with('success', 'Rekam Medis berhasil diperbarui.');
    }

    public function destroy(RekamMedis $rekamMedis)
    {
        $rekamMedis->delete();
        return redirect()->route('rekam_medis.index')->with('success', 'Rekam Medis berhasil dihapus.');
    }
}