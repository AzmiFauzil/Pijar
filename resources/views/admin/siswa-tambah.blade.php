<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data siswa</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
</head>

<body>
    <div class="grid">

        <header class="header">
            <div class="menu" onclick="openSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <h2>Tambah siswa</h2>
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
        <a href="{{ route('admin.dashboard') }}">
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

            <form action="{{ route('admin.siswa.store') }}" method="POST">
                @csrf
                <div class="add-siswa-box">

                    <div class="add-siswa-box-form">
                        <div class="add-siswa-box-form-group">
                            <label>NIS</label>
                            <input type="text" name="NIS" value="{{ old('NIS') }}" placeholder="Masukkan NIS" required>
                            @error('NIS') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                        </div>

                        <div class="add-siswa-box-form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_user" value="{{ old('nama_user') }}" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>

                    <div class="add-siswa-box-form">
                        <div class="add-siswa-box-form-group">
                            <label>Kelas</label>
                            <select name="kelas" required>
                                <option value="">Pilih kelas</option>
                                <option value="X DKV" {{ old('kelas') == 'X DKV' ? 'selected' : '' }}>X DKV</option>
                                <option value="X PPLG" {{ old('kelas') == 'X PPLG' ? 'selected' : '' }}>X PPLG</option>
                                <option value="XI DKV" {{ old('kelas') == 'XI DKV' ? 'selected' : '' }}>XI DKV</option>
                                <option value="XI PPLG" {{ old('kelas') == 'XI PPLG' ? 'selected' : '' }}>XI PPLG</option>
                            </select>
                        </div>

                        <div class="add-siswa-box-form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                            @error('email') <span style="color:red; font-size:12px;">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="add-siswa-box-form">
                        <div class="add-siswa-box-form-group">
                            <label>No. HP</label>
                            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" placeholder="Masukkan no HP" required>
                        </div>

                        <div class="add-siswa-box-form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <div class="add-siswa-box-form">
                        <div class="add-siswa-box-form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="Ulangi password" required>
                        </div>
                    </div>

                    <div class="button-add-siswa-group">
                        <a href="{{ route('admin.siswa.index') }}" class="btn btn-cancel" style="text-decoration:none; line-height:2.5; text-align:center;">
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