<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
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
            <h2>Dashboard</h2>
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
                    <a href="{{ route('admin.siswa.index') }}">
                        <span class="material-symbols-outlined">manage_accounts</span>
                        Data siswa
                    </a>
                </li>

                <li class="item">
                    <a href="{{ route('alat.index') }}">
                        <span class="material-symbols-outlined">folder_managed</span>
                        Data alat
                    </a>
                </li>

                <li class="item">
                    <a href="{{ route('kategori.index') }}">
                        <span class="material-symbols-outlined">category</span>
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
                    <button class="btn btn-logout" onclick="window.location.href='{{ url('/logout') }}'">
                        <a href="{{ url('/logout') }}" style="color: white; text-decoration: none;">Logout</a>
                    </button>
                </li>
            </ul>
        </aside>

        <main class="main">
            <div class="cards">

                <div class="card">
                    <div class="inner">
                        <h3>Total Alat</h3>
                        <span class="material-symbols-outlined">format_list_bulleted</span>
                    </div>
                    <h4>120</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Alat Dipinjam</h3>
                        <span class="material-symbols-outlined">format_list_bulleted_add</span>
                    </div>
                    <h4>45</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Alat Tersedia</h3>
                        <span class="material-symbols-outlined">checklist</span>
                    </div>
                    <h4>75</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Jumlah User</h3>
                        <span class="material-symbols-outlined">user_attributes</span>
                    </div>
                    <h4>120</h4>
                </div>

            </div>

            <div class="box">

                <div class="chart-1">
                    <div class="chart-title">
                        <h2>Grafik Peminjaman</h2>

                    </div>

                    <div class="doughnut-chart">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>


                <div class="chart-2" id="warning">

                    <div class="chart-title" id="warning-title">
                        <h2>Peringatan</h2>
                    </div>

                    <div class="warning">

                        <div class="warning-item">
                            <img src="img/image.png" alt="">

                            <div class="text">
                                <h4>InFocus IN1124</h4>
                                <p>Dipinjam oleh : Anisa</p>
                                <div class="late-red">Terlambat 3 hari</div>
                            </div>
                        </div>

                        <div class="warning-item">
                            <img src="img/image.png" alt="">

                            <div class="text">
                                <h4>InFocus IN1124</h4>
                                <p>Dipinjam oleh : Aul</p>
                                <div class="late-orange">Terlambat 1 hari</div>
                            </div>
                        </div>

                        <div class="warning-item">
                            <img src="img/image.png" alt="">

                            <div class="text">
                                <h4>InFocus IN1124</h4>
                                <p>Dipinjam oleh : Pei</p>
                                <div class="late-red">Terlambat 3 hari</div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>


            <div class="chart-3">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peminjam</th>
                            <th>Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Anisa</td>
                            <td>Proyektor</td>
                            <td>12 Mei 2026</td>
                            <td>15 Mei 2026</td>
                            <td><button class="borrow">Dipinjam</button></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Safei</td>
                            <td>Kamera</td>
                            <td>13 Mei 2026</td>
                            <td>16 Mei 2026</td>
                            <td><button class="return">Dikembalikan</button></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Nurul</td>
                            <td>Terminal</td>
                            <td>11 Mei 2026</td>
                            <td>14 Mei 2026</td>
                            <td><button class="late">Terlambat</button></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Amalia</td>
                            <td>Proyektor</td>
                            <td>11 Mei 2026</td>
                            <td>14 Mei 2026</td>
                            <td><button class="late">Terlambat</button></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td>Putri</td>
                            <td>Pel</td>
                            <td>11 Mei 2026</td>
                            <td>14 Mei 2026</td>
                            <td><button class="late">Terlambat</button></td>
                        </tr>
                    </tbody>

                </table>

            </div>

    </div>



    </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="{{ asset('js/chart1-admin.js') }}"></script>
    <script src="{{ asset('js/chart2-admin.js') }}"></script>
    <script src="{{ asset('js/dashboard-admin.js') }}"></script>
</body>

</html>