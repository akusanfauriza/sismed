<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
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

        .form-container {
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
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input, textarea, button {
            width: 377px;   
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input:focus, textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;        
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;

        }

        button:hover {
            background-color: #0056b3;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Obat</h1>
        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="nama_obat">Nama Obat:</label>
            <input type="text" name="nama_obat" id="nama_obat" value="{{ $obat->nama_obat }}" placeholder="Masukkan nama obat" required>

            <label for="jenis_obat">Jenis Obat:</label>
            <input type="text" name="jenis_obat" id="jenis_obat" value="{{ $obat->jenis_obat }}" placeholder="Masukkan jenis obat" required>

            <label for="dosis">Dosis:</label>
            <input type="text" name="dosis" id="dosis" value="{{ $obat->dosis }}" placeholder="Masukkan dosis obat" required>

            <label for="stok">Stok:</label>
            <input type="number" name="stok" id="stok" value="{{ $obat->stok }}" placeholder="Masukkan jumlah stok" required>

            <label for="harga">Harga:</label>
            <input type="number" name="harga" id="harga" value="{{ $obat->harga }}" placeholder="Masukkan harga obat" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" placeholder="Masukkan keterangan tambahan">{{ $obat->keterangan }}</textarea>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
