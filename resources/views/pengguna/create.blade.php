<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
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
    width: 100%; /* Responsif untuk perangkat yang lebih kecil */
    box-sizing: border-box; /* Pastikan padding tidak memengaruhi ukuran */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #444;
}

input[type="text"], 
input[type="password"], 
input[type="email"], 
textarea, 
select {
    width: 100%; /* Sesuaikan dengan container */
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

input:focus, textarea:focus, select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

textarea {
    resize: vertical;
    min-height: 80px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    color: white;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

button:active {
    background-color: #004085;
}

p[style="color: red;"] {
    font-size: 14px;
    margin: -15px 0 10px; /* Mengurangi jarak antar input jika ada error */
    color: #e3342f !important; /* Tetap merah meskipun gaya lain diterapkan */
}

@media (max-width: 600px) {
    body {
        padding: 20px;
    }

    .container {
        padding: 20px;
    }

    h1 {
        font-size: 20px;
    }
}

    </style>
</head>
<body>
    <div class="container">
    <h1>Tambah Pengguna</h1>
    <form action="{{ route('pengguna.store') }}" method="POST">
        @csrf
        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username') }}" required>
        @error('username') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Password:</label>
        <input type="password" name="password" required>
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Role:</label>
        <select name="role" required>
            <option value="">Pilih Role</option>
            <option value="administrator">Administrator</option>
            <option value="dokter">Dokter</option>
            <option value="apoteker">Apoteker</option>
        </select>
        @error('role') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
        @error('nama_lengkap') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <label>No HP:</label>
        <input type="text" name="no_hp" value="{{ old('no_hp') }}">
        @error('no_hp') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>
