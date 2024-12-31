<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: rgb(215, 215, 233); /* Warna latar yang lembut */
    margin: 0;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    background: #ffffff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 500px;
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

select, button {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

input[type="date"] {
    width: 50vh;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

select:focus, input[type="date"]:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

button {
    background-color: #28a745; /* Hijau yang ramah */
    color: white;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #218838; /* Hijau lebih gelap saat di-hover */
}

button:active {
    background-color: #1e7e34;
}

@media (max-width: 480px) {
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 20px;
    }

    select, input[type="date"], button {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <div class="container">
    <h1>Edit Antrian</h1>
    <form action="{{ route('antrian.update', $antrian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="id_pasien">Pasien:</label>
        <select name="id_pasien" id="id_pasien" required>
            @foreach ($dataPasien as $pasien)
                <option value="{{ $pasien->id }}" {{ $antrian->id_pasien == $pasien->id ? 'selected' : '' }}>{{ $pasien->nama }}</option>
            @endforeach
        </select><br>

        <label for="tanggal_antrian">Tanggal Antrian:</label>
        <input type="date" name="tanggal_antrian" id="tanggal_antrian" value="{{ $antrian->tanggal_antrian }}" required><br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="sedang diperiksa" {{ $antrian->status == 'sedang diperiksa' ? 'selected' : '' }}>Sedang Diperiksa</option>
            <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select><br>

        <label for="id_dokter">Dokter:</label>
        <select name="id_dokter" id="id_dokter" required>
            @foreach ($dataDokter as $dokter)
                <option value="{{ $dokter->id }}" {{ $antrian->id_dokter == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama_lengkap }}</option>
            @endforeach
        </select><br>

        <button type="submit">Update</button>
    </form>
    </div>
</body>
</html>
