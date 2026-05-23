<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data kategori</title>
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
            <h2>Edit data kategori</h2>
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
          <a href="data-siswa-admin.blade."><span class="material-symbols-outlined">manage_accounts</span>
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

    <div class="add-category-box">


        <div class="add-category-box-form">

            <div class="add-category-box-form-group">
                <label>Nama kategori</label>
                <input type="text" placeholder="Masukkan nama kategori">
            </div>

        </div>

        <div class="add-category-box-form">

            <div class="add-category-box-form-group">
                <label>Deskripsi kategori</label>
                <input type="text" placeholder="Masukkan deskripsi kategori">
            </div>

        </div>

        <div class="add-category-box-form">

            <div class="add-category-box-form-group">
                <label>Jumlah alat</label>
                <input type="text" placeholder="Masukkan jumlah alat kategori">
            </div>

        </div>

        <div class="button-add-category-group">

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