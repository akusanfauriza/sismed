<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rekam Medis</title>
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
    padding: 20px;
}

.container {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin-top: 5%;
    margin-bottom:5%;
    margin-left: 60vh;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-size: 16px;
    color: #555;
    margin-bottom: 10px;
    font-weight: bold;
}

select, textarea, input[type="date"], button {
    padding: 10px;
    margin-bottom: 15px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 100%;
}

textarea {
    resize: vertical;
    min-height: 80px;
}

button {
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
    padding: 10px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
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
    <h1>Edit Rekam Medis</h1>
    <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            @foreach ($pasien as $p)
                <option value="{{ $p->id }}" {{ $p->id == $rekamMedis->id_pasien ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            @foreach ($dokter as $d)
                <option value="{{ $d->id }}" {{ $d->id == $rekamMedis->id_dokter ? 'selected' : '' }}>{{ $d->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <label for="diagnosa">Diagnosa:</label>
        <textarea name="diagnosa" id="diagnosa" required>{{ $rekamMedis->diagnosa }}</textarea><br>

        <label for="id_obat">Obat:</label>
        <select name="id_obat" id="id_obat" required>
            @foreach ($obat as $o)
                <option value="{{ $o->id }}" {{ $o->id == $rekamMedis->id_obat ? 'selected' : '' }}>{{ $o->nama_obat }}</option>
            @endforeach
        </select><br>

        <label for="catatan">Catatan:</label>
        <textarea name="catatan" id="catatan">{{ $rekamMedis->catatan }}</textarea><br>

        <label for="tanggal_periksa">Tanggal Periksa:</label>
        <input type="date" name="tanggal_periksa" id="tanggal_periksa" value="{{ $rekamMedis->tanggal_periksa }}" required><br>

        <button type="submit">Simpan Perubahan</button>
    </form>
    </div>
</body>
</html>