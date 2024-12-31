<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(215, 215, 233); /* Warna latar yang sama */
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
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
    margin-bottom: 10px;
    font-weight: bold;
    color: #555;
}

select, button {
    width: 100%; /* Pastikan elemen menyesuaikan lebar container */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    
}
input[type="date"] {
    width: 377px; /* Pastikan elemen menyesuaikan lebar container */
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

select:focus, input[type="date"]:focus {
    border-color: #007bff;
    outline: none;
}

button {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
    <h1>Tambah Antrian</h1>
    <form action="{{ route('antrian.store') }}" method="POST">
        @csrf
        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            <option value="">Pilih Pasien</option>
            @foreach ($dataPasien as $pasien)
                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
            @endforeach
        </select><br>

        <label for="tanggal_antrian">Tanggal Antrian:</label>
        <input type="date" name="tanggal_antrian" id="tanggal_antrian" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu">Menunggu</option>
            <option value="sedang diperiksa">Sedang Diperiksa</option>
            <option value="selesai">Selesai</option>
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            <option value="">Pilih Dokter</option>
            @foreach ($dataDokter as $dokter)
                <option value="{{ $dokter->id }}">{{ $dokter->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <button type="submit">Simpan</button>
    </form>
    </div>
</body>
</html>
