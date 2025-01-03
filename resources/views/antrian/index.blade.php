<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Antrian</title>
    <style>
        /* Reset default styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(215, 215, 233);
    color: #333;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.container {
    flex-grow: 1; /* Memungkinkan container untuk memenuhi ruang yang tersisa */
    width: 100%;
    background:#fff;
    padding: 75px;
    box-sizing: border-box; /* Pastikan padding tidak melebihi lebar kontainer */
}


h1 {
    text-align: center;
    margin-bottom: 20px;
    color:rgb(0, 0, 0);
}

a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
    transition: color 0.3s ease;
}

a:hover {
    color: #388E3C;
}

/* Table styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 16px;
}

thead th {
    background-color: #fff;
    color: black;
    text-align: left;
    padding: 10px;
    transition: background-color 0.3s ease;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #eafaf1;
    transition: background-color 0.3s ease;
}

/* Button styles */
button {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
    background-color: #d32f2f;
    transform: scale(1.05);
}

/* Link button styles */
a[href*="create"] {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

a[href*="edit"] {
    display: inline-block;
    background-color: #2196F3;
    color: white;
    padding: 8px 12px;
    border-radius: 4px;
    margin-right: 5px;
    transition: background-color 0.3s ease;
}

a[href*="create"]:hover {
    background-color: #388E3C;
}

a[href*="edit"]:hover {
    background-color: #1976D2;
}

header {
    background-color: #48c9b0;
    color: black;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 40px;
}

header nav {
    display: flex;
    gap: 50px;
}

header nav a {
    color: black;
    font-weight: bold;
    text-decoration: none;
    font-size: 16px;
}

header nav a:hover {
    text-decoration: underline;
}

footer {
    background-color: #48c9b0;
    color: black;
    text-align: center;
    font-weight: bold;
    padding: 16px 40px;
    margin-top: auto;
}

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

th, td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

th {
    background-color: #f4f4f9;
    color: #333;
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

/* Responsiveness */
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

    thead {
        display: none;
    }

    tbody, tr, td {
        display: block;
        width: 100%;
    }

    tbody td {
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        text-align: left;
        font-weight: bold;
    }
}

    </style>
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