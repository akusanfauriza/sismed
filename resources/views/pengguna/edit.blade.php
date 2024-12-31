<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
   <style>
    body {
            font-family: Arial, sans-serif;
            background-color:rgb(215, 215, 233);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        /* body {
            font-family: Arial, sans-serif;
            background-color:rgb(215, 215, 233);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        } */

        /* .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        } */

        .container{
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
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

        input[type="text"], input[type="password"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
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
        }

        button:hover {
            background-color: #218838;
        }

        button:active {
            background-color: #1e7e34;
        }

        p {
            margin: 0;
            font-size: 14px;
        }

        p[style="color: red;"] {
            margin-top: -10px;
            margin-bottom: 15px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Edit Pengguna</h1>
    <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Username:</label>
        <input type="text" name="username" value="{{ old('username', $pengguna->username) }}" required>
        @error('username') <p style="color: red;">{{ $message }}</p> @enderror

        <label>Password (Wajib di isi, Baru / Lama):</label>
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
    </div>
</body>
</html>
