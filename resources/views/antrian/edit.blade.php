<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian</title>
</head>
<body>
    <h1>Edit Antrian</h1>

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

    <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="id_pasien">Pasien:</label>
            <select name="id_pasien" id="id_pasien">
                @foreach ($dataPasien as $pasien)
                    <option value="{{ $pasien->id }}" {{ $pasien->id == $antrian->id_pasien ? 'selected' : '' }}>{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="tanggal_antrian">Tanggal Antrian:</label>
            <input type="date" name="tanggal_antrian" id="tanggal_antrian" value="{{ $antrian->tanggal_antrian->format('Y-m-d') }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="sedang diperiksa" {{ $antrian->status == 'sedang diperiksa' ? 'selected' : '' }}>Sedang Diperiksa</option>
                <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div>
            <label for="id_dokter">Dokter:</label>
            <select name="id_dokter" id="id_dokter">
                @foreach ($dataDokter as $dokter)
                    <option value="{{ $dokter->id }}" {{ $dokter->id == $antrian->id_dokter ? 'selected' : '' }}>{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Perbarui Antrian</button>
    </form>
</body>
</html>
