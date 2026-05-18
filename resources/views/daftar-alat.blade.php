<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
    <h1>Daftar Alat</h1>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('alat.create') }}">Tambah Alat</a>

    <table border="1" style="width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alats as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->kategoriAlat->nama }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a href="{{ route('alat.edit', $item) }}">Edit</a>
                        |
                        <form action="{{ route('alat.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
</body>
</html>