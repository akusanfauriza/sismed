<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('pengguna.create') }}">Tambah Pengguna</a>
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPengguna as $index => $pengguna)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pengguna->username }}</td>
                    <td>{{ $pengguna->nama_lengkap }}</td>
                    <td>{{ $pengguna->email }}</td>
                    <td>{{ $pengguna->role }}</td>
                    <td>
                        <a href="{{ route('pengguna.edit', $pengguna->id) }}">Edit</a>
                        <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>