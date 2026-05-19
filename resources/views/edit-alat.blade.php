<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Edit Alat</h1>
        <form action="{{ route('alat.update', $alat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="nama_alat">Nama Alat:</label>
            <input type="text" id="nama_alat" name="nama_alat" value="{{ $alat->nama_alat }}" required><br><br>

            <label for="kategori_id">Kategori:</label>
            <select id="kategori_id" name="kategori_id" required>
                @foreach ($kategoriAlat as $kategori)
                    <option value="{{ $kategori->id }}" {{ $alat->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select><br><br>

            <button type="submit">Update</button>
            <a href="{{ route('alat.index') }}">Batal</a>
        </form>
    </div>
</body>
</html>