<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pasien</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(215, 215, 233); /* Warna latar yang lembut */
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    position: relative;
}

.container {
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
    position: absolute; /* Menempatkan container secara absolut */
    top: 50%; /* Menempatkan container di tengah vertikal */
    left: 50%; /* Menempatkan container di tengah horizontal */
    transform: translate(-50%, -50%); /* Menggeser container untuk benar-benar berada di tengah */
    margin-top:15%;
}

h1 {
    text-align: center;
    margin-bottom: 10px;
    font-size: 24px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 1px;
    font-weight: bold;
    color: #444;
}

input[type="text"], input[type="date"], textarea, select {
    width: 500px; /* Tetapkan ukuran tetap */
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box; /* Untuk mencegah perubahan ukuran saat zoom */
}

textarea {
    resize: vertical;
    min-height: 100px;
}

input:focus, textarea:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #28a745; /* Hijau yang ramah */
    color: white;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838; /* Hijau lebih gelap saat di-hover */
}

button:active {
    background-color: #1e7e34;
}

div[style="color: red;"] {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid red;
    background-color: #f8d7da;
    border-radius: 5px;
    font-size: 14px;
}

ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

li {
    color: #721c24;
    font-weight: bold;
}

@media (max-width: 480px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 20px;
    }

    input[type="text"], input[type="date"], textarea, select, button {
        font-size: 14px;
    }
}
    </style>
</head>
<body>
    <div class="container">
    <h1>Tambah Pasien</h1>

    <!-- Tampilkan error jika validasi gagal -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pasien.store') }}" method="POST">
        @csrf

        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea name="alamat" id="alamat" required></textarea><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label><br>
        <select name="jenis_kelamin" id="jenis_kelamin" required>
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select><br><br>

        <label for="no_hp">No HP:</label><br>
        <input type="text" name="no_hp" id="no_hp"><br><br>

        <label for="riwayat_penyakit">Riwayat Penyakit:</label><br>
        <textarea name="riwayat_penyakit" id="riwayat_penyakit"></textarea><br><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>
