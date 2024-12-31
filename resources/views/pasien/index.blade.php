<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pasien</title>
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
            background-color: #002f6c;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 40px;
        }

        header nav {
            display: flex;
            gap: 30px;
        }

        header nav a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        header nav a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #002f6c;
            color: white;
            text-align: center;
            padding: 14px 19px;
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
            padding: 75px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        } */

        .success-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .add-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
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

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a, .actions button {
            text-decoration: none;
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }

            .actions {
                flex-direction: column;
            }

            .actions a, .actions button {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <h2>Sistem Informasi Pasien</h2>
    </div>
    <nav>
        <a href="#">Home</a>
        <a href="#">Daftar Obat</a>
        <a href="#">Tentang</a>
        <a href="#">Kontak</a>
    </nav>
</header>
<div class="container">
    <h1>Daftar Pasien</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <!-- Tombol Tambah Data -->
    <a href="{{ route('pasien.create') }}" class="add-button">Tambah Pasien</a>

    <!-- Tabel Daftar Pasien -->
    <table>
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
                        <div class="action-buttons">
                            <!-- Edit Pasien -->
                            <a href="{{ route('pasien.edit', $pasien->id) }}">Edit</a>

                            <!-- Hapus Data -->
                            <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data pasien.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<footer>
    <p>&copy; 2024 Sistem Informasi Apotek Sismed</p>
</footer>
</body>
</html>
