<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form div {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea, button {
            padding: 8px;
            width: 100%;
            max-width: 400px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Edit Data Obat</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Override method ke PUT -->

        <div>
            <label for="nama_obat">Nama Obat</label>
            <input type="text" name="nama_obat" id="nama_obat" value="{{ $obat->nama_obat }}" required>
        </div>

        <div>
            <label for="jenis_obat">Jenis Obat</label>
            <input type="text" name="jenis_obat" id="jenis_obat" value="{{ $obat->jenis_obat }}" required>
        </div>

        <div>
            <label for="dosis">Dosis</label>
            <input type="text" name="dosis" id="dosis" value="{{ $obat->dosis }}" required>
        </div>

        <div>
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" value="{{ $obat->stok }}" required>
        </div>

        <div>
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" value="{{ $obat->harga }}" required>
        </div>

        <div>
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan">{{ $obat->keterangan }}</textarea>
        </div>

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>