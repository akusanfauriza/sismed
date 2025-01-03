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

        <form action="{{ route('rekam_medis.update', $rekamMedis->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
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

            <div class="form-group">
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

            <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <textarea name="diagnosa" class="form-control">{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
            </div>

            <div class="form-group">
                <label for="tindakan">Tindakan</label>
                <textarea name="tindakan" class="form-control">{{ old('tindakan', $rekamMedis->tindakan) }}</textarea>
            </div>

            <div class="form-group">
                <label for="resep_obat">Resep Obat</label>
                <textarea name="resep_obat" class="form-control">{{ old('resep_obat', $rekamMedis->resep_obat) }}</textarea>
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $rekamMedis->tanggal) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>