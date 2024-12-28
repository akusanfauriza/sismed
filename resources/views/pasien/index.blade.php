<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pasien</title>
</head>
<body>
    <h1>Daftar Pasien</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Tombol Tambah Data -->
    <a href="{{ route('pasien.create') }}" style="margin-bottom: 20px; display: inline-block;">Tambah Pasien</a>

    <!-- Tabel Daftar Pasien -->
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Riwayat Penyakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataPasien as $pasien)
                <tr>
                    <td>{{ $pasien->id }}</td>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->tanggal_lahir }}</td>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                    <td>{{ $pasien->no_hp ?? '-' }}</td>
                    <td>{{ $pasien->riwayat_penyakit ?? '-' }}</td>
                    <td>
                        <!-- Edit Pasien -->
                        <a href="{{ route('pasien.edit', $pasien->id) }}">Edit</a>

                        <!-- Hapus Data -->
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data pasien.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
