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
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    max-width: 500px;
    width: 100%;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

form div {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
    color: #555;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
    height: 100px;
}

button {
    background-color: #007BFF;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

.error {
    background-color: #ffdddd;
    border: 1px solid #ff5c5c;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
}

.error ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.error li {
    color: #d8000c;
}

@media (max-width: 600px) {
    .container {
        padding: 15px;
    }

    h1 {
        font-size: 1.5rem;
    }

    button {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>