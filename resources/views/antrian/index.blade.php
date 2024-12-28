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

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Antrian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataAntrian as $index => $antrian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $antrian->pasien->nama }}</td>
                    <td>{{ $antrian->dokter->nama }}</td>
                    <td>{{ $antrian->tanggal_antrian->format('d-m-Y') }}</td>
                    <td>{{ ucfirst($antrian->status) }}</td>
                    <td>
                        <a href="{{ route('antrian.edit', $antrian->id) }}">Edit</a>
                        <form action="{{ route('antrian.destroy', $antrian->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus antrian ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
