<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Obat</title>
</head>
<body>
    <h1>Daftar Obat</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>Dosis</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataObat as $obat)
            <tr>
                <td>{{ $obat->id }}</td>
                <td>{{ $obat->nama_obat }}</td>
                <td>{{ $obat->jenis_obat }}</td>
                <td>{{ $obat->dosis }}</td>
                <td>{{ $obat->stok }}</td>
                <td>{{ $obat->harga }}</td>
                <td>{{ $obat->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
