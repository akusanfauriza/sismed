<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
</head>
<body>
    <h1>Daftar Antrian</h1>
    <a href="{{ route('antrian.create') }}">Tambah Antrian</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Tanggal Antrian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAntrian as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->dokter->nama_lengkap }}</td>
                    <td>{{ $item->tanggal_antrian }}</td>
                    <td>{{ ucfirst($item->status) }}</td>
                    <td>
                        <a href="{{ route('antrian.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('antrian.destroy', $item->id) }}" method="POST" style="display:inline;">
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
