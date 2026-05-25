<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Kategori Alat</title>
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
            <h2>Kelola Kategori</h2>
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

            <div class="filter-box">

                <div class="search-box">
                    <input type="text" placeholder="Cari kategori">
                    <span class="material-symbols-outlined">search</span>
                </div>

                <select>
                    <option>Semua Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="kebersihan">Kebersihan</option>
                </select>

                <button class="btn-add">
                    <a href="{{ url('/kategori/create') }}"> <span class="material-symbols-outlined">add</span>
                        Tambah Kategori
                    </a>
                </button>

            </div>

            <div class="table-category">

                <table class="category-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Jumlah alat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Elektronik</td>
                            <td>Kategori alat elektronik seperti proyektor,
                                terminal, speaker, dll</td>
                            <td>45</td>
                            <td class="aksi">
                                <button class="edit">
                                    <a href="kategori-edit.blade.php">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                </button>

                                <button class="hapus">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Olahraga</td>
                            <td>Kategori alat olahraga seperti ayam,
                                nasi goreng, speaker, dll</td>
                            <td>20</td>
                            <td class="aksi">
                                <button class="edit">
                                    <a href="kategori-edit.blade.php">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                </button>

                                <button class="hapus">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Kebersihan</td>
                            <td>Kategori alat kebersihan seperti pel,
                                sapu, ember, dll</td>
                            <td>45</td>
                            <td class="aksi">
                               <button class="edit">
                                    <a href="{{ url('/kategori/edit') }}"> 
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                </button>

                                <button class="hapus">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>


        </main>

</body>

</html>