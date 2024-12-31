<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <style>
        /* Reset dasar dan styling umum */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color:rgb(215, 215, 233);
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin-left: 75vh;
    margin-top: 5%;
    margin-bottom: 5%;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    color: #555;
    margin-bottom: 5px;
    font-weight: bold;
}

select, textarea, input[type="date"], button {
    padding: 10px;
    margin-bottom: 15px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

select, input[type="date"] {
    width: 100%;
}

textarea {
    resize: vertical;
    width: 100%;
    min-height: 100px;
}

button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    padding: 10px;
    font-weight: bold;
}

button:hover {
    background-color: #45a049;
}

/* Responsif */
@media (max-width: 600px) {
    .container {
        width: 90%;
        padding: 15px;
    }
    h1 {
        font-size: 20px;
    }
}

    </style>
</head>
<body>
    <div class="container">
    <h1>Tambah Rekam Medis</h1>
    <form action="{{ route('rekam_medis.store') }}" method="POST">
        @csrf
        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            @foreach ($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            @foreach ($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <label for="diagnosa">Diagnosa:</label>
        <textarea name="diagnosa" id="diagnosa" required></textarea><br>

        <label for="id_obat">Obat:</label>
        <select name="id_obat" id="id_obat" required>
            @foreach ($obat as $o)
                <option value="{{ $o->id }}">{{ $o->nama_obat }}</option>
            @endforeach
        </select><br>

        <label for="catatan">Catatan:</label>
        <textarea name="catatan" id="catatan"></textarea><br>

        <label for="tanggal_periksa">Tanggal Periksa:</label>
        <input type="date" name="tanggal_periksa" id="tanggal_periksa" required><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>