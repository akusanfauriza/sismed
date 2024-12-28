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
            <option value="">Pilih Pasien</option>
            @foreach ($dataPasien as $pasien)
                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
            @endforeach
        </select><br>

        <label for="tanggal_antrian">Tanggal Antrian:</label>
        <input type="date" name="tanggal_antrian" id="tanggal_antrian" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu">Menunggu</option>
            <option value="sedang diperiksa">Sedang Diperiksa</option>
            <option value="selesai">Selesai</option>
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            <option value="">Pilih Dokter</option>
            @foreach ($dataDokter as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
