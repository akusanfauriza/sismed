<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian</title>
</head>
<body>
    <h1>Edit Antrian</h1>
    <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            @foreach ($dataPasien as $pasien)
                <option value="{{ $pasien->id }}" {{ $antrian->id_pasien == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
            @endforeach
        </select><br>

        <label for="tanggal_antrian">Tanggal Antrian:</label>
        <input type="date" name="tanggal_antrian" id="tanggal_antrian" value="{{ $antrian->tanggal_antrian }}" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="sedang diperiksa" {{ $antrian->status == 'sedang diperiksa' ? 'selected' : '' }}>Sedang Diperiksa</option>
            <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            @foreach ($dataDokter as $dokter)
                <option value="{{ $dokter->id }}" {{ $antrian->id_dokter == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
