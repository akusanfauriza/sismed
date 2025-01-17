<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Antrian</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(215, 215, 233);
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
        margin-bottom: 8px;
        font-weight: bold;
        color: #555;
    }

    input{
        width: 40vh;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px; 
    }
    
    select, button {
        width: 42.5vh;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
    }

    select:focus, input:focus {
        border-color: #007bff;
        outline: none;
    }

    button {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        cursor: pointer;
        border: none;
    }

    button:hover {
        background-color: #0056b3;
    }

    .cancel {
        background-color:rgb(238, 38, 38);
        color: white;
        font-weight: bold;
        cursor: pointer;
        border: none;
    }

    .cancel:hover {
        background-color:rgb(209, 55, 28);
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
            <option value="">-- Pilih Pasien --</option>
            @foreach($pasien as $p)
                <option value="{{ $p->id }}" {{ $p->id == $antrian->id_pasien ? 'selected' : '' }}>
                    {{ $p->nama }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="dokter_id">Dokter:</label>
        <select name="dokter_id" id="dokter_id" required>
            <option value="">-- Pilih Dokter --</option>
            @foreach($dokter as $d)
                <option value="{{ $d->id }}" {{ $d->id == $antrian->dokter_id ? 'selected' : '' }}>
                    {{ $d->nama_lengkap }}
                </option>
            @endforeach
        </select>
        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="menunggu" {{ $antrian->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="diproses" {{ $antrian->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $antrian->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
        <br>

        <label for="nomor_antrian">Nomor Antrian:</label>
        <input type="text" id="nomor_antrian" name="nomor_antrian" value="{{ $antrian->nomor_antrian }}" required>
        <br>

        <label for="waktu_antrian">Waktu Antrian:</label>
        <input type="datetime-local" id="waktu_antrian" name="waktu_antrian" value="{{ $antrian->waktu_antrian ? \Carbon\Carbon::parse($antrian->waktu_antrian)->format('Y-m-d\TH:i') : '' }}">
        <br>

        <button type="submit">Simpan</button>
        <button class="cancel" href="{{ route('antrian.index') }}">Batal</button>
    </form>
    </div>
</body>
</html>
