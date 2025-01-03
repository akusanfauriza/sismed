<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rekam Medis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Rekam Medis</h1>
        <a href="{{ route('rekam_medis.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rekamMedis as $rm)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rm->pasien->nama }}</td>
                    <td>{{ $rm->dokter->nama_lengkap }}</td>
                    <td>{{ $rm->diagnosa }}</td>
                    <td>{{ $rm->tindakan }}</td>
                    <td>{{ $rm->tanggal }}</td>
                    <td>
                        <a href="{{ route('rekam_medis.edit', $rm->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rekam_medis.destroy', $rm->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>