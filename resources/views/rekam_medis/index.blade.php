<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rekam Medis</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
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

.success-message {
    color: green;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
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
            <h2>Sistem Informasi Rekam Medis</h2>
        </div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Daftar Obat</a>
            <a href="#">Tentang</a>
            <a href="#">Kontak</a>
        </nav>
    </header>
    <div class="container mt-5">
        <h1>Daftar Rekam Medis</h1>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif


        <a href="{{ route('rekam_medis.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
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
                    <td>{{ $rm->pasien->id }}</td>
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
    <footer>
    <p>&copy; 2024 Sistem Informasi Apotek Sismed</p>
    </footer>
</body>
</html>