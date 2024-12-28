<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian</title>
</head>
<body>
    <h1>Tambah Antrian Baru</h1>

    <!-- Menampilkan pesan error validasi -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('antrian.store') }}" method="POST">
        @csrf
        <div>
            <label for="id_pasien">Pasien:</label>
            <select name="id_pasien" id="id_pasien">
                @foreach ($dataPasien as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tanggal_antrian">Tanggal Antrian:</label>
            <input type="date" name="tanggal_antrian" id="tanggal_antrian" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="menunggu">Menunggu</option>
                <option value="sedang diperiksa">Sedang Diperiksa</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>

        <div>
            <label for="id_dokter">Dokter:</label>
            <select name="id_dokter" id="id_dokter">
                @foreach ($dataDokter as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan Antrian</button>
    </form>
</body>
</html>
