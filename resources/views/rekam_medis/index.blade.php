<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rekam Medis</title>
</head>
<body>
    <h1>Daftar Rekam Medis</h1>
    <a href="{{ route('rekam_medis.create') }}">Tambah Rekam Medis</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Diagnosa</th>
                <th>Obat</th>
                <th>Catatan</th>
                <th>Tanggal Periksa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekamMedis as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->dokter->nama_lengkap }}</td>
                    <td>{{ $item->diagnosa }}</td>
                    <td>{{ $item->obat->nama_obat }}</td>
                    <td>{{ $item->catatan }}</td>
                    <td>{{ $item->tanggal_periksa }}</td>
                    <td>
                        <a href="{{ route('rekam_medis.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('rekam_medis.destroy', $item->id) }}" method="POST" style="display:inline;">
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