<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
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
            <h2>Laporan</h2>
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

            <div class="box-laporan">

                <div class="box-laporan-1">

                    <div class="box-laporan-title">
                        <h2>Grafik Peminjaman</h2>

                        <select class="dropdown">
                            <option value="">Periode</option>
                            <option value="1d">1 Hari</option>
                            <option value="7d">7 Hari</option>
                            <option value="30d">30 Hari</option>
                            <option value="6m">6 Bulan</option>
                            <option value="1y">1 Tahun</option>
                        </select>
                    </div>

                    <div class="doughnut-chart">
                        <canvas id="myChart"></canvas>
                    </div>

                </div>


                <div class="box-laporan-2">

                    <div class="box-laporan-title">
                        <h2>Grafik peminjaman berdasarkan kategori</h2>
                    </div>

                    <div class="bar-chart">
                        <canvas id="bar-chart"></canvas>
                    </div>

                </div>

            </div>


            <!-- <div class="box-laporan-3">
  <div class="box-laporan-title">
    <h2>ABYCSTQVYI</h2>
  </div>
  <table>

    <thead>
      
    </thead>

    <tbody>
    </tbody>

  </table>

</div>

    </div> -->



        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <script src="{{ asset('js/chart1-admin.js') }}"></script>
    <script src="{{ asset('js/chart2-admin.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>