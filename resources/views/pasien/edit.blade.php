<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(215, 215, 233);
    margin: 0;
    padding: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    box-sizing: border-box;
}

.container {
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 500px; /* Fixed width to prevent scaling with zoom */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #444;
}

input[type="text"], input[type="date"], textarea, select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box; /* Prevents width scaling */
}

input:focus, textarea:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: 10px; /* Memberikan jarak antar tombol */
}

.kembali{
    width: 100%;
    padding: 12px;
    background-color:rgb(194, 62, 52);
    color: white;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    margin-top: 10px; /* Memberikan jarak antar tombol */
}

.kembali:hover{
    background-color: rgb(231, 37, 37);
}
button:hover {
    background-color: #218838;
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

    </style>
</head>
<body>
    <div class="container">
    <h1>Edit Data Pasien</h1>

    <!-- Tampilkan pesan error validasi -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required><br><br>

        <label for="alamat">Alamat:</label>
        <textarea id="alamat" name="alamat" required>{{ old('alamat', $pasien->alamat) }}</textarea><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required><br><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
            <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select><br><br>

        <label for="no_hp">No HP:</label>
        <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}"><br><br>

        <label for="riwayat_penyakit">Riwayat Penyakit:</label>
        <textarea id="riwayat_penyakit" name="riwayat_penyakit">{{ old('riwayat_penyakit', $pasien->riwayat_penyakit) }}</textarea><br><br>

        <button type="submit">Simpan Perubahan</button>
        <button class="kembali" href="{{ route('pasien.index') }}">Kembali</button>
    </form>
    </div>
</body>
</html>
