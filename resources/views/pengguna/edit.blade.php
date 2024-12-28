<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
</head>
<body>
    <h1>Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $pengguna->username) }}" required>
        @error('username') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Password (kosongkan jika tidak diubah):</label>
        <input type="password" name="password">
        @error('password') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Role:</label>
        <select name="role" required>
            <option value="">Pilih Role</option>
            <option value="administrator" {{ $pengguna->role == 'administrator' ? 'selected' : '' }}>Administrator</option>
            <option value="dokter" {{ $pengguna->role == 'dokter' ? 'selected' : '' }}>Dokter</option>
            <option value="apoteker" {{ $pengguna->role == 'apoteker' ? 'selected' : '' }}>Apoteker</option>
        </select>
        @error('role') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $pengguna->nama_lengkap) }}" required>
        @error('nama_lengkap') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $pengguna->email) }}" required>
        @error('email') <p style="color: red;">{{ $message }}</p> @enderror

        <label>No HP:</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $pengguna->no_hp) }}">
        @error('no_hp') <p style="color: red;">{{ $message }}</p> @enderror

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
