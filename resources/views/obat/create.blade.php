<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Obat</title>
</head>
<body>
    <h1>Tambah Obat</h1>
    <form action="{{ route('obat.store') }}" method="POST">
    @csrf
    <label for="nama_obat">Nama Obat:</label>
    <input type="text" name="nama_obat" id="nama_obat" required><br><br>

    <label for="jenis_obat">Jenis Obat:</label>
    <input type="text" name="jenis_obat" id="jenis_obat" required><br><br>

    <label for="dosis">Dosis:</label>
    <input type="text" name="dosis" id="dosis" required><br><br>

    <label for="stok">Stok:</label>
    <input type="number" name="stok" id="stok" required><br><br>

    <label for="harga">Harga:</label>
    <input type="number" name="harga" id="harga" required><br><br>

    <label for="keterangan">Keterangan:</label>
    <textarea name="keterangan" id="keterangan"></textarea><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>
