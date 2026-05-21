<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Data Alat</h4>
                        <a href="{{ route('alat.create') }}" class="btn btn-primary">Tambah Alat</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama Alat</th>
                                        <th>Kategori</th>
                                        <th>Jumlah</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alat as $no => $item)
                                    <tr>
                                        <td class="text-center">{{ $no + 1 }}</td>
                                        <td>{{ $item->nama_alat }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $item->kategori->nama_kategori }}</span>
                                        </td>
                                        <td class="text-center">{{ $item->jumlah_alat }}</td>
                                        
                                        <td class="text-center">
                                            <a href="{{ route('alat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            
                                            <form action="{{ route('alat.destroy', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus alat ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        {{ $alat->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>