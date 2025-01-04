<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Antrian</title>
    <style>
/* Reset default styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: rgb(215, 215, 233);
    color: #333;
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

a {
    text-decoration: none;
    color: #4CAF50;
    font-weight: bold;
}

a:hover {
    color: #388E3C;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input {
    width: 40vh;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}
select, button{
    width: 42.5vh;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input:focus, select:focus {
    border-color: #007bff;
    outline: none;
}

button {
    background-color: #007bff;
    color: white;
    font-weight: bold;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

.back{
    background-color:rgb(238, 38, 38);
    color: white;
    font-weight: bold;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s;
}

.back:hover {
    background-color:rgb(209, 55, 28);
}

.success-message {
    color: green;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

footer {
    background-color: #48c9b0;
    color: black;
    text-align: center;
    font-weight: bold;
    padding: 16px 40px;
    margin-top: auto;
}

@media (max-width: 768px) {
    input, select, button {
        font-size: 14px;
    }
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
            <option value="">-- Pilih Pasien --</option>
            @foreach($pasien as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
        <br>

        <label for="dokter_id">Dokter:</label>
        <select name="dokter_id" id="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->id }}">{{ $d->nama_lengkap }}</option>
            @endforeach
        </select>
        <br>

        <label>Status:</label>
        <select name="status" required>
            <option value="menunggu">Menunggu</option>
            <option value="diproses">Diproses</option>
            <option value="selesai">Selesai</option>
        </select>
        <br>

        <label>Nomor Antrian:</label>
        <input type="text" name="nomor_antrian" required>
        <br>

        <label>Waktu Antrian:</label>
        <input type="datetime-local" name="waktu_antrian">
        <br>

        <button type="submit">Simpan</button>
        <button class="back" onclick="window.location='{{ route('antrian.index') }}'">Kembali</button>
    </form>
    
    </div>
</body>
</html>
