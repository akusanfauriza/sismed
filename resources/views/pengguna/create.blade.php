<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
</head>
<body>
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
</body>
</html>
