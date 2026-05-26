<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Pengembalian</title>
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
            <h2>Kelola pengembalian</h2>
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

            <div class="filter-box">

                <div class="search-box">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" placeholder="Cari nama siswa atau alat">
                </div>

                <div class="date-box">
                    <input type="date" name="tanggal-pengembalian" id="tanggal-pengembalian">
                </div>

                <div class="status-box">
                    <select name="status-pengembalian" id="status-pengembalian">
                        <option value="">Semua status</option>
                        <option value="dipinjam">Dipinjam</option>
                        <option value="dikembalikan">Dikembalikan</option>
                        <option value="terlambat">Terlambat</option>
                    </select>
                </div>

            </div>

            <div class="table-pengembalian">

                <table class="pengembalian-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pinjaman</th>
                            <th>Nama Peminjam</th>
                            <th>Kelas Peminjam</th>
                            <th>Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Pj-240520-001</td>
                            <td>Cahya</td>
                            <td>XI DKV</td>

                            <td class="alat-pengembalian">
                                <!-- <img src="img/image.png" alt=""> -->
                                <span>Proyektor BenQ MS550</span>
                            </td>

                            <td>26 April 2026</td>
                            <td>03 Mei 2026</td>

                            <td><button class="late">Terlambat</button></td>

                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Pj-240520-002</td>
                            <td>Akmal</td>
                            <td>X DKV</td>

                            <td class="alat-pengembalian">
                                <!-- <img src="img/image.png" alt=""> -->
                                <span>Proyektor BenQ MS550</span>
                            </td>

                            <td>26 April 2026</td>
                            <td>03 Mei 2026</td>

                            <td><button class="borrow">Dipinjam</button></td>

                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Pj-240520-003</td>
                            <td>Fei</td>
                            <td>XII PPLG</td>

                            <td class="alat-pengembalian">
                                <!-- <img src="img/image.png" alt=""> -->
                                <span>Proyektor BenQ MS550</span>
                            </td>

                            <td>26 April 2026</td>
                            <td>03 Mei 2026</td>

                            <td><button class="borrow">Dipinjam</button></td>

                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Pj-240520-004</td>
                            <td>Syifa</td>
                            <td>X PPLG</td>

                            <td class="alat-pengembalian">
                                <!-- <img src="img/image.png" alt=""> -->
                                <span>Proyektor BenQ MS550</span>
                            </td>

                            <td>26 April 2026</td>
                            <td>03 Mei 2026</td>

                            <td><button class="return">Dikembalikan</button></td>

                        </tr>

                        <tr>
                            <td>5</td>
                            <td>Pj-240520-005</td>
                            <td>Rina</td>
                            <td>XI PPLG</td>

                            <td class="alat-pengembalian">
                                <!-- <img src="img/image.png" alt=""> -->
                                <span>Proyektor BenQ MS550</span>
                            </td>

                            <td>26 April 2026</td>
                            <td>03 Mei 2026</td>

                            <td><button class="late">Terlambat</button></td>

                        </tr>


                    </tbody>

                </table>


            </div>



        </main>
    </div>
</body>

</html>