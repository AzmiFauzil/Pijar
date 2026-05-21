<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Alat</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('alat.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="nama_alat" class="form-label">Nama Alat <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="nama_alat" 
                                       class="form-control @error('nama_alat') is-invalid @enderror" 
                                       id="nama_alat" 
                                       value="{{ old('nama_alat') }}" 
                                       placeholder="Masukkan nama alat" 
                                       required>
                                @error('nama_alat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                                <select name="kategori_id" 
                                        class="form-select @error('kategori_id') is-invalid @enderror" 
                                        id="kategori_id" 
                                        required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategori as $kat)
                                        <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                            {{ $kat->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('kategori_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                             <div class="mb-3">
                                <label for="jumlah_alat" class="form-label">Jumlah Alat <span class="text-danger">*</span></label>
                                <input type="number"
                                       name="jumlah_alat"
                                       class="form-control @error('jumlah_alat') is-invalid @enderror"
                                       id="jumlah_alat"
                                       value="{{ old('jumlah_alat') }}"
                                       placeholder="Masukkan jumlah alat"
                                       required>
                                @error('jumlah_alat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('alat.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>