<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
</head>
<body>
<header>
        <div class="logo">
            <h2>Sistem Informasi Antrian</h2>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Daftar Obat</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </nav>
    </header>
    <div class="container">
    <h1>Daftar Antrian</h1>
     <!-- Notifikasi Flash Message -->
        @if(session('success'))
     <p class="success-message"> {{ session('success') }}</p>
    @endif

    <a href="{{ route('antrian.create') }}">Tambah Antrian</a>
    <table>
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Nomor Antrian</th>
                <th>Waktu Antrian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($antrian as $item)
            <tr>
                <td>{{ $item->id_pasien }}</td>
                <td>{{ $item->pasien->nama ?? 'Tidak Diketahui' }}</td>
                <td>{{ $item->dokter->nama_lengkap }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->nomor_antrian }}</td>
                <td>{{ $item->waktu_antrian }}</td>
                <td>
                    <a href="{{ route('antrian.edit', $item) }}">Edit</a>
                    <form action="{{ route('antrian.destroy', $item) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div> 
    <footer>
        <p>&copy; 2024 Sistem Informasi Apotek Sismed</p>
    </footer>
</body>
</html>
