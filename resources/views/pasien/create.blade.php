<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
</head>
<body>
    <h1>Tambah Pasien</h1>

    <!-- Tampilkan error jika validasi gagal -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea name="alamat" id="alamat" required></textarea><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" name="no_hp" id="no_hp"><br><br>

        <label for="riwayat_penyakit">Riwayat Penyakit:</label><br>
        <textarea name="riwayat_penyakit" id="riwayat_penyakit"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
