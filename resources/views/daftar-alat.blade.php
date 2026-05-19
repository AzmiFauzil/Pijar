<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Daftar Alat</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Alat</th>
            <th>Kategori</th>
        </tr>
        @foreach ($alat as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_alat }}</td>
            <td>{{ $item->kategori->nama_kategori }}</td>
        </tr>
        @endforeach

</body>
</html>