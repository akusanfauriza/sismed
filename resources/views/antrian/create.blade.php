<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian</title>
</head>
<body>
    <h1>Tambah Antrian</h1>
    <form action="{{ route('antrian.store') }}" method="POST">
        @csrf

        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            <option value="">-- Pilih Pasien --</option>
            @foreach($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
        <br>

        <label for="dokter_id">Dokter:</label>
        <select name="dokter_id" id="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama_lengkap }}</option>
            @endforeach
        </select>
        <br>

        <label>Status:</label>
        <select name="status" required>
            <option value="menunggu">Menunggu</option>
            <option value="diproses">Diproses</option>
            <option value="selesai">Selesai</option>
        </select>
        <br>

        <label>Nomor Antrian:</label>
        <input type="text" name="nomor_antrian" required>
        <br>

        <label>Waktu Antrian:</label>
        <input type="datetime-local" name="waktu_antrian">
        <br>

        <button type="submit">Simpan</button>
    </form>
    <a href="{{ route('antrian.index') }}">Kembali</a>
</body>
</html>
