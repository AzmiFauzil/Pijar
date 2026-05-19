<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <nav>
        <h1>Hapus Alat</h1>
        <p>Apakah Anda yakin ingin menghapus alat ini?</p>
        <form action="{{ route('alat.destroy', $alat->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
            <a href="{{ route('alat.index') }}">Batal</a>
        </form>
    </nav>
</body>
</html>