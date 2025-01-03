<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> -->
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
    align-items: flex-start;
    min-height: 100vh;
    padding: 20px;
}

.container {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    width: 100%;
    margin-top: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color:rgb(0, 0, 0);
    font-weight: bold;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

select, button {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input, textarea {
    width: 61vh;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
}

input:focus, select:focus, textarea:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 4px rgba(0, 123, 255, 0.5);
}

textarea {
    resize: vertical;
    min-height: 100px;
}

button {
    background-color: #28a745;
    color: white;
    font-weight: bold;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease-in-out;
}

button:hover {
    background-color: #218838;
}

.alert {
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 4px;
    font-size: 14px;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

footer {
    text-align: center;
    margin-top: 30px;
    font-size: 14px;
    color: #666;
}

@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    button {
        font-size: 14px;
    }

    input, select, textarea {
        font-size: 14px;
    }
}
     </style>
</head>
<body>
    <div class="container ">
        <h1>Tambah Rekam Medis</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rekam_medis.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_pasien" class="form-label">Nama Pasien</label>
                <select name="id_pasien" id="id_pasien" class="form-control" required>
                    <option value="">Pilih Pasien</option>
                    @foreach($pasien as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="dokter_id" value="{{ auth()->id() }}">
            <div class="mb-3">
                <label for="diagnosa" class="form-label">Diagnosa</label>
                <textarea name="diagnosa" id="diagnosa" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tindakan" class="form-label">Tindakan</label>
                <textarea name="tindakan" id="tindakan" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="resep_obat" class="form-label">Resep Obat</label>
                <textarea name="resep_obat" id="resep_obat" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>