<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
<style>
    /* Reset dan dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color:rgb(215, 215, 233);
    line-height: 1.6;
}

.container {
    width: 80%;
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Judul */
h1 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
}

/* Form */
.form {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 16px;
    margin-bottom: 8px;
    font-weight: bold;
}

select, textarea, input[type="date"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    background-color: #f9f9f9;
    transition: border-color 0.3s ease;
}

select:focus, textarea:focus, input[type="date"]:focus {
    border-color: #007bff;
    outline: none;
}

/* Textarea khusus */
textarea {
    min-height: 100px;
    resize: vertical;
}

/* Button */
button[type="submit"] {
    width: 100%;
    padding: 15px;
    background-color: #007bff;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Alert error */
.alert {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}

.alert ul {
    margin: 0;
    padding-left: 20px;
}

.alert ul li {
    list-style-type: disc;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 20px;
    }

    h1 {
        font-size: 22px;
    }

    button[type="submit"] {
        font-size: 16px;
    }
}
</style>
</head>
<body>
    <div class="container">
        <h1>Edit Rekam Medis</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rekam_medis.update', $rekamMedis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form">
                <label for="id_pasien">Nama Pasien</label>
                <select name="id_pasien" class="form-control">
                    @foreach($pasien as $pasienItem)
                        <option value="{{ $pasienItem->id }}" 
                            {{ old('id_pasien', $rekamMedis->id_pasien) == $pasienItem->id ? 'selected' : '' }}>
                            {{ $pasienItem->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form">
                <label for="dokter_id">Dokter</label>
                <select name="dokter_id" class="form-control">
                    @foreach($dokter as $dokterItem)
                        <option value="{{ $dokterItem->id }}" 
                            {{ old('dokter_id', $rekamMedis->dokter_id) == $dokterItem->id ? 'selected' : '' }}>
                            {{ $dokterItem->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form">
                <label for="diagnosa">Diagnosa</label>
                <textarea name="diagnosa" class="form-control">{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
            </div>

            <div class="form">
                <label for="tindakan">Tindakan</label>
                <textarea name="tindakan" class="form-control">{{ old('tindakan', $rekamMedis->tindakan) }}</textarea>
            </div>

            <div class="form">
                <label for="resep_obat">Resep Obat</label>
                <textarea name="resep_obat" class="form-control">{{ old('resep_obat', $rekamMedis->resep_obat) }}</textarea>
            </div>

            <div class="form">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $rekamMedis->tanggal) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>