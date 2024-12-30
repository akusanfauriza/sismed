<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
</head>
<body>
    <h1>Tambah Rekam Medis</h1>
    <form action="{{ route('rekam_medis.store') }}" method="POST">
        @csrf
        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            @foreach ($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            @foreach ($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <label for="diagnosa">Diagnosa:</label>
        <textarea name="diagnosa" id="diagnosa" required></textarea><br>

        <label for="id_obat">Obat:</label>
        <select name="id_obat" id="id_obat" required>
            @foreach ($obat as $o)
                <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
            @endforeach
        </select><br>

        <label for="catatan">Catatan:</label>
        <textarea name="catatan" id="catatan"></textarea><br>

        <label for="tanggal_periksa">Tanggal Periksa:</label>
        <input type="date" name="tanggal_periksa" id="tanggal_periksa" required><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>