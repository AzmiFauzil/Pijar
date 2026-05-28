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
                    <button class="btn btn-logout" onclick="window.location.href='{{ url('/logout') }}'" style="color: white; text-decoration: none;">
                        <b>Logout</b>
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
                    <h4>{{ $total_alat }}</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Alat Dipinjam</h3>
                        <span class="material-symbols-outlined">format_list_bulleted_add</span>
                    </div>
                    <h4>{{ $total_dipinjam }}</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Alat Tersedia</h3>
                        <span class="material-symbols-outlined">checklist</span>
                    </div>
                    <h4>{{ $total_tersedia }}</h4>
                </div>

                <div class="card">
                    <div class="inner">
                        <h3>Jumlah User</h3>
                        <span class="material-symbols-outlined">user_attributes</span>
                    </div>
                    <h4>{{ $total_user }}</h4>
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

                        @forelse($late_peminjaman as $late)
                            <div class="warning-item">
                                <img src="{{ asset('images/logo_pijar.png') }}" alt="" style="width: 40px; height: 40px; object-fit: contain;">
                                <div class="text">
                                    <h4>{{ $late->nama_alat }}</h4>
                                    <p>Dipinjam oleh : {{ $late->nama_user }}</p>
                                    <div class="late-red">
                                        Terlambat {{ now()->diffInDays(\Carbon\Carbon::parse($late->tanggal_peminjaman)) }} hari
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p style="text-align: center; padding: 20px; font-size: 12px; color: #666;">Tidak ada keterlambatan.</p>
                        @endforelse

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
                        @foreach($recent_peminjaman as $no => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_user }}</td>
                            <td>{{ $item->nama_alat }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_peminjaman)->format('d M Y') }}</td>
                            <td>-</td>
                            <td>
                                @if($item->return_id)
                                    <button class="return">Dikembalikan</button>
                                @else
                                    <button class="borrow">Dipinjam</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
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