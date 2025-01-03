<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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