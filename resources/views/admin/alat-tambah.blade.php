<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Alat</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
    <style>
    .text-danger {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 5px;
        display: block;
    }
    </style>
</head>

<body>
    <div class="grid">

        <header class="header">
            <div class="menu" onclick="openSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <h2>Tambah Alat</h2>
        </header>

        <aside class="sidebar">
            <div class="title">
                <div class="logo">
                    <img src="{{ asset('images/logo_pijar.png') }}" alt="logo">
                </div>
                <span class="material-symbols-outlined" onclick="closeSidebar()">close</span>
            </div>

           <ul class="list">
    <li class="item">
        <a href="{{ url('/dashboard-admin') }}">
            <span class="material-symbols-outlined">home</span>
            Dashboard Admin
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/data-siswa-admin') }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            Data siswa
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/alat') }}"> <span class="material-symbols-outlined">folder_managed</span>
            Data alat
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/kategori') }}"> <span class="material-symbols-outlined">category</span>
            Kategori
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/peminjaman-admin') }}">
            <span class="material-symbols-outlined">folder_open</span>
            Peminjaman
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/pengembalian-admin') }}">
            <span class="material-symbols-outlined">manage_history</span>
            Pengembalian
        </a>
    </li>
    <li class="item">
        <a href="{{ url('/laporan-admin') }}">
            <span class="material-symbols-outlined">report</span>
            Laporan
        </a>
    </li>
    <li class="logout-btn">
        <button class="btn btn-logout">
            <a href="{{ url('/logout') }}">Logout</a>
        </button>
    </li>
</ul>
        </aside>

        <main class="main">
            <form action="{{ route('alat.store') }}" method="POST">
                @csrf

                <div class="add-alat-box">
                    <div class="add-alat-box-form">
                        <div class="add-alat-box-form-group">
                            <label for="nama_alat">Nama alat</label>
                            <input type="text" id="nama_alat" name="nama_alat" value="{{ old('nama_alat') }}"
                                placeholder="Masukkan nama alat">
                            @error('nama_alat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="add-alat-box-form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" id="kategori_id">
                                <option value="">Pilih kategori</option>
                                {{-- Looping kategori dari database --}}
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                                @endforeach
                            </select>
                            @error('kategori_id') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Menambahkan input field jumlah agar sinkron saat data baru dibuat --}}
                    <div class="add-alat-box-form">
                        <div class="add-alat-box-form-group">
                            <label for="jumlah_alat">Jumlah alat</label>
                            <input type="number" id="jumlah_alat" name="jumlah_alat" value="{{ old('jumlah_alat', 0) }}"
                                placeholder="Masukkan jumlah alat">
                            @error('jumlah_alat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="button-add-alat-group">
                        <a href="{{ route('alat.index') }}" class="btn btn-cancel"
                            style="text-decoration: none; text-align: center; display: inline-block; line-height: 2.5;">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-save">
                            Simpan
                        </button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</body>

</html>