<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
</head>
<body>
    <h1>Edit Data Pasien</h1>

    <!-- Tampilkan pesan error validasi -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required><br><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required>{{ old('alamat', $pasien->alamat) }}</textarea><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select><br><br>

        <label for="no_hp">No HP:</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"><br><br>

        <label for="riwayat_penyakit">Riwayat Penyakit:</label>
        <textarea id="riwayat_penyakit" name="riwayat_penyakit">{{ old('riwayat_penyakit', $pasien->riwayat_penyakit) }}</textarea><br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('pasien.index') }}">Kembali</a>
    </form>
</body>
</html>
