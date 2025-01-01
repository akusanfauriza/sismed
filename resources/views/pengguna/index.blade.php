<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
   <style>

body {
    font-family: Arial, sans-serif;
    background-color: rgb(215, 215, 233);
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    min-height: 100vh; /* Perbaikan: pastikan tinggi minimum adalah layar penuh */
}

.container {
    flex-grow: 1; /* Memungkinkan container untuk memenuhi ruang yang tersisa */
    width: 100%;
    background: #fff;
    padding: 75px;
    box-sizing: border-box; /* Pastikan padding tidak melebihi lebar kontainer */
}
    /* Global Styles */
    /* body {
        font-family: Arial, sans-serif;
        background-color: rgb(215, 215, 233);
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    } */

    header {
        background-color: #48c9b0;
        color: black;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 40px;
    }

    header nav {
        display: flex;
        gap: 50px;
    }

    header nav a {
        color: black;
        text-decoration: none;
        font-size: 16px;
        font-weight:bold;
    }

    header nav a:hover {
        text-decoration: underline;
    }

    footer {
        background-color: #48c9b0;
        color: black;
        text-align: center;
        padding: 0px;
        font-weight:bold;
        margin-top: auto;
    }

    h1 {
        text-align: center;
        color: #333;
        margin: 20px 0;
    }

    /* .container {
        width: 90%;
        max-width: 1200px;
        margin: 50px auto;
        background: #fff;
        padding: 50px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    } */

    a {
        text-decoration: none;
    }

    .add-button {
        display: inline-block;
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        transition: background-color 0.3s ease;
    }

    .add-button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f9;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .action-buttons a, .action-buttons button {
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        color: white;
    }

    .action-buttons a {
        background-color: #2196F3;
    }

    .action-buttons a:hover {
        background-color: #1976D2;
    }

    .action-buttons button {
        background-color: #f44336;
    }

    .action-buttons button:hover {
        background-color: #d32f2f;
    }

    .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

    @media (max-width: 768px) {
        table, th, td {
            font-size: 14px;
        }

        .add-button {
            width: 100%;
            text-align: center;
        }

        .action-buttons {
            flex-direction: column;
        }

        .action-buttons a, .action-buttons button {
            width: 100%;
            margin: 5px 0;
        }
    }
</style>

</head>
<body>
<header>
    <div class="logo">
        <h2>Sistem Informasi Pengguna</h2>
    </div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Daftar Obat</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </nav>
</header>
<div class="container">
    <h1>Daftar Pengguna</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Tombol Tambah Data -->
    <a href="{{ route('pengguna.create') }}" class="add-button">Tambah Pengguna</a>

    <!-- Tabel Daftar Pengguna -->
    <table>
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
                        <div class="action-buttons">
                            <a href="{{ route('pengguna.edit', $pengguna->id) }}">Edit</a>
                            <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<footer>
    <p>&copy; 2024 Sistem Informasi Pengguna</p>
</footer>
</body>
</html>
