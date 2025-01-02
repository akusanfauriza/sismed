<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
</head>
<body>
    <!-- Notifikasi Flash Message -->
    @if(session('success'))
        {{ session('success') }}
    @endif

    <h1>Daftar Antrian</h1>
    <a href="{{ route('antrian.create') }}">Tambah Antrian</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID Pasien</th>
                <th>Dokter</th>
                <th>Nama Pasien</th>
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
                <td>{{ $item->dokter->nama_lengkap }}</td>
                <td>{{ $item->pasien->nama ?? 'Tidak Diketahui' }}</td>
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
</body>
</html>