<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah alat</title>
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
            <h2>Tambah alat</h2>
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
          <a href="dashboard-admin.blade.php">
            <span class="material-symbols-outlined">home</span>
          Dashboard Admin
          </a>
        </li>
        <li class="item">
          <a href="data-siswa-admin.blade.php.html"><span class="material-symbols-outlined">manage_accounts</span>
          Data siswa</a>
        </li>
        <li class="item">
          <a href="data-alat-admin.blade.php"><span class="material-symbols-outlined">folder_managed</span>
          Data alat</a>
        </li>
        <li class="item">
          <a href="category-admin.blade.php"><span class="material-symbols-outlined">category</span>
          Kategori</a>
        </li>
        <li class="item">
          <a href="peminjaman-admin.blade.php"><span class="material-symbols-outlined">folder_open</span>
          Peminjaman</a>
        </li>
        <li class="item">
          <a href="pengembalian-admin.blade.php"><span class="material-symbols-outlined">manage_history</span>
          Pengembalian</a>
        </li>
        <li class="item">
          <a href="laporan-admin.blade.php"><span class="material-symbols-outlined">report</span>
          Laporan</a>
        </li>
        <li class="logout-btn">
                    <button class="btn btn-logout">
                        <a href="">Logout</a>
                    </button>
                </li>
      </ul>
        </aside>

    <main class="main">

    <div class="add-alat-box">


        <div class="add-alat-box-form">

            <div class="add-alat-box-form-group">
                <label>Nama alat</label>
                <input type="text" placeholder="Masukkan nama alat">
            </div>

            <div class="add-alat-box-form-group">
                <label>Kategori</label>
                <select name="" id="">
                    <option value="">Pilih kategori</option>
                    <option value="">Elektronik</option>
                    <option value="">Olahraga</option>
                    <option value="">Kebersihan</option>
                </select>
            </div>

        </div>

        <div class="add-alat-box-form">

            <div class="add-alat-box-form-group">
                <label>Jumlah alat</label>
                <input type="text" placeholder="Masukkan jumlah alat">
            </div>

            <div class="add-alat-box-form-group">
                <label>Alat tersedia</label>
                <input type="text" placeholder="Masukkan jumlah alat tersedia">
            </div>

        </div>

        <div class="add-alat-box-form">

            <div class="add-alat-box-form-group">
                <label>Status alat</label>
                <select name="status-alat" id="status-alat">
                    <option value="">Status alat</option>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak">Tidak tersedia</option>
                </select>
            </div>

            <div class="add-alat-box-form-group">
                <label>Alat dipinjam</label>
                <input type="text" placeholder="Masukkan jumlah alat dipinjam">
            </div>

        </div>

        <div class="button-add-alat-group">

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