<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        $rekamMedis = RekamMedis::with('pasien', 'dokter')->get();
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Pengguna::where('role', 'dokter')->get();
        return view('rekam_medis.create', compact('pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:pengguna,id',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'resep_obat' => 'nullable',
            'tanggal' => 'required|date',
        ]);

        RekamMedis::create($request->all());
        return redirect()->route('rekam_medis.index')->with('success', 'Rekam Medis berhasil ditambahkan.');
    }

    public function edit(RekamMedis $rekamMedis)
    {
        $pasien = Pasien::all();
        $dokter = Pengguna::where('role', 'dokter')->get();
        return view('rekam_medis.edit', compact('rekamMedis', 'pasien', 'dokter'));
    }

    public function update(Request $request, RekamMedis $rekamMedis)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasien,id',
            'dokter_id' => 'required|exists:pengguna,id',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'resep_obat' => 'nullable',
            'tanggal' => 'required|date',
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
