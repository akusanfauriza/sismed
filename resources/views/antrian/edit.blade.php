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
            <option value="">-- Pilih Pasien --</option>
            @foreach($pasien as $p)
                <option value="{{ $p->id }}" {{ $p->id == $antrian->id_pasien ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="dokter_id">Dokter:</label>
        <select name="dokter_id" id="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->id }}" {{ $d->id == $antrian->dokter_id ? 'selected' : '' }}>
                    {{ $d->nama_lengkap }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="diproses" {{ $antrian->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
        <br>

        <label for="nomor_antrian">Nomor Antrian:</label>
        <input type="text" id="nomor_antrian" name="nomor_antrian" value="{{ $antrian->nomor_antrian }}" required>
        <br>

        <label for="waktu_antrian">Waktu Antrian:</label>
        <input type="datetime-local" id="waktu_antrian" name="waktu_antrian" value="{{ $antrian->waktu_antrian ? \Carbon\Carbon::parse($antrian->waktu_antrian)->format('Y-m-d\TH:i') : '' }}">
        <br>

        <button type="submit">Simpan</button>
        <a href="{{ route('antrian.index') }}">Batal</a>
    </form>
</body>
</html>
