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
                    <img src="img/logo.png" alt="logo">
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

            <div class="add-siswa-box">


                <div class="add-siswa-box-form">

                    <div class="add-siswa-box-form-group">
                        <label>NIS</label>
                        <input type="text" placeholder="Masukkan NIS">
                    </div>

                    <div class="add-siswa-box-form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap">
                    </div>

                </div>

                <div class="add-siswa-box-form">

                    <div class="add-siswa-box-form-group">
                        <label>Kelas</label>

                        <select>
                            <option>Pilih kelas</option>
                            <option>X DKV</option>
                            <option>X PPLG</option>
                            <option>XI DKV</option>
                            <option>XI PPLG</option>
                        </select>
                    </div>

                    <div class="add-siswa-box-form-group">
                        <label>Jenis Kelamin</label>

                        <select>
                            <option>Pilih jenis kelamin</option>
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>

                </div>

                <div class="add-siswa-box-form">

                    <div class="add-siswa-box-form-group">
                        <label>No. HP</label>
                        <input type="text" placeholder="Masukkan no HP">
                    </div>

                    <div class="add-siswa-box-form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Masukkan email">
                    </div>

                </div>

                <div class="button-add-siswa-group">

                    <button class="btn btn-cancel">
                        Batal
                    </button>

                    <button class="btn btn-save">
                        Simpan
                    </button>

                </div>

            </div>

        </main>
    </div>
</body>

</html>