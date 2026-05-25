<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PIJAR — Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
    <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Poppins', system-ui, sans-serif;
        background: #ece7dc;
        height: 100vh;
        display: flex;
    }

    /* SIDEBAR */
    .sidebar {
        width: 200px;
        min-width: 200px;
        background: #1c1408;
        display: flex;
        flex-direction: column;
        color: #e8d5b0;
    }

    .sidebar-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 22px 18px 18px;
        border-bottom: 0.5px solid rgba(200, 168, 75, 0.2);
    }

    .logo-icon {
        width: 38px;
        height: 38px;
        background: #c8a84b;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .logo-name {
        font-size: 15px;
        font-weight: 600;
        color: #c8a84b;
        letter-spacing: 1.5px;
    }

    .sidebar-nav {
        flex: 1;
        padding: 14px 0;
    }

    .nav-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 11px 18px;
        font-size: 13px;
        color: #8b7040;
        cursor: pointer;
        transition: background 0.15s, color 0.15s;
        border-left: 2px solid transparent;
    }

    .nav-item:hover {
        background: rgba(200, 168, 75, 0.08);
        color: #e8d5b0;
    }

    .nav-item.active {
        background: rgba(200, 168, 75, 0.14);
        color: #c8a84b;
        border-left: 2px solid #c8a84b;
    }

    .nav-item i {
        font-size: 17px;
    }

    /* MAIN */
    .main {
        flex: 1;
        overflow-y: auto;
        padding: 24px;
        background: #f5f0e8;
    }

    .page-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c1f0a;
        margin-bottom: 18px;
    }

    /* STAT CARDS */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        margin-bottom: 18px;
    }

    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 14px 16px;
        border: 0.5px solid #e0d5c0;
    }

    .stat-icon {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 15px;
        margin-bottom: 8px;
    }

    .stat-icon.warn {
        background: #fef3c7;
        color: #b45309;
    }

    .stat-icon.ok {
        background: #d1fae5;
        color: #047857;
    }

    .stat-icon.blue {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .stat-icon.gray {
        background: #f3f4f6;
        color: #374151;
    }

    .stat-num {
        font-size: 24px;
        font-weight: 600;
        color: #1a1008;
    }

    .stat-label {
        font-size: 12px;
        color: #6b5630;
        margin-top: 2px;
    }

    .stat-sub {
        font-size: 10px;
        color: #c8a84b;
        margin-top: 4px;
    }

    .stat-sub.green {
        color: #059669;
    }

    .stat-sub.blue {
        color: #1d4ed8;
    }

    /* PANELS */
    .two-col {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
        margin-bottom: 14px;
    }

    .panel {
        background: #fff;
        border-radius: 12px;
        border: 0.5px solid #e0d5c0;
        overflow: hidden;
    }

    .panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 13px 16px 11px;
        border-bottom: 0.5px solid #f0e8d5;
    }

    .panel-title {
        font-size: 13px;
        font-weight: 600;
        color: #2c1f0a;
    }

    .btn-sm {
        font-size: 11px;
        color: #c8a84b;
        background: #fef9ee;
        border: 0.5px solid #e8d5a0;
        border-radius: 6px;
        padding: 3px 10px;
        cursor: pointer;
    }

    /* TASK TABLE */
    .task-header {
        display: grid;
        grid-template-columns: 1fr 90px 90px 70px;
        gap: 6px;
        padding: 7px 16px;
        background: #f9f5ee;
        font-size: 10px;
        color: #8b6f3a;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .task-row {
        display: grid;
        grid-template-columns: 1fr 90px 90px 70px;
        align-items: center;
        gap: 6px;
        padding: 9px 16px;
        border-bottom: 0.5px solid #f5eedf;
        font-size: 11px;
    }

    .task-row:last-child {
        border-bottom: none;
    }

    .task-name {
        font-weight: 600;
        color: #2c1f0a;
        font-size: 11px;
    }

    .task-sub {
        color: #8b6f3a;
        font-size: 10px;
        margin-top: 1px;
    }

    /* BADGES */
    .badge {
        display: inline-flex;
        align-items: center;
        gap: 3px;
        padding: 3px 7px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-red {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-amber {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-blue {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-green {
        background: #d1fae5;
        color: #065f46;
    }

    .overdue {
        color: #dc2626;
        font-size: 10px;
        font-weight: 600;
    }

    .ontime {
        color: #059669;
        font-size: 10px;
        font-weight: 600;
    }

    .pending {
        color: #92400e;
        font-size: 10px;
    }

    /* LOG */
    .log-row {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        padding: 10px 16px;
        border-bottom: 0.5px solid #f5eedf;
        font-size: 11px;
    }

    .log-row:last-child {
        border-bottom: none;
    }

    .log-icon {
        width: 26px;
        height: 26px;
        min-width: 26px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        margin-top: 1px;
    }

    .log-icon.ok {
        background: #d1fae5;
        color: #047857;
    }

    .log-icon.info {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .log-icon.warn {
        background: #fef3c7;
        color: #b45309;
    }

    .log-icon.red {
        background: #fee2e2;
        color: #991b1b;
    }

    .log-text {
        flex: 1;
    }

    .log-title {
        font-weight: 600;
        color: #2c1f0a;
        font-size: 11px;
        margin-bottom: 2px;
    }

    .log-desc {
        color: #8b6f3a;
        font-size: 10px;
        line-height: 1.4;
    }

    .log-time {
        color: #b0956a;
        font-size: 10px;
        white-space: nowrap;
    }

    /* BOTTOM ROW */
    .bottom-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px;
    }

    .donut-wrap {
        display: flex;
        align-items: center;
        gap: 20px;
        padding: 16px;
    }

    .donut-legend {
        flex: 1;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
        font-size: 12px;
        color: #4b3a1a;
    }

    .dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
        flex-shrink: 0;
    }

    .legend-val {
        font-weight: 600;
        margin-left: auto;
    }

    .legend-pct {
        color: #8b6f3a;
        margin-left: 4px;
        font-size: 10px;
    }

    /* NOTIF */
    .notif-list {
        padding: 6px 0;
    }

    .notif-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 16px;
        border-bottom: 0.5px solid #f5eedf;
        font-size: 11px;
        color: #2c1f0a;
    }

    .notif-item:last-child {
        border-bottom: none;
    }

    .notif-item i {
        font-size: 15px;
        flex-shrink: 0;
    }

    .notif-item.red-n {
        background: #fff5f5;
    }

    .notif-item.amber-n {
        background: #fffbeb;
    }

    .notif-item.yellow-n {
        background: #fffde7;
    }

    .notif-item.blue-n {
        background: #f0f9ff;
    }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">📚</div>
            <span class="logo-name">PiJAR</span>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-item active">
                <a href="{{ url('/dashboard-petugas') }}" style="text-decoration: none; color: inherit;">
                    <i class="ti ti-home"></i> Beranda
                </a>
            </div>
            <a href="{{ url('/petugas/peninjauan-peminjaman') }}" class="nav-item" style="text-decoration: none;">
                <i class="ti ti-file-text"></i> Meninjau Peminjaman
            </a>
            <a href="{{ url('/petugas/peninjauan-pengembalian') }}" class="nav-item" style="text-decoration: none;">
                <i class="ti ti-arrow-back-up"></i> Meninjau Pengembalian
            </a>
            <a href="{{ url('/petugas/log-aktivitas') }}" class="nav-item" style="text-decoration: none;">
                <i class="ti ti-activity"></i> Log Aktivitas
            </a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <div class="page-title">Beranda</div>

        <!-- Stat Cards -->
        <div class="stat-grid">
            <div class="stat-card">
                <div class="stat-icon warn"><i class="ti ti-clock"></i></div>
                <div class="stat-num">12</div>
                <div class="stat-label">Menunggu Tinjauan</div>
                <div class="stat-sub">Pengajuan belum ditinjau</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon ok"><i class="ti ti-circle-check"></i></div>
                <div class="stat-num">5</div>
                <div class="stat-label">Disetujui hari ini</div>
                <div class="stat-sub green">Peminjaman disetujui</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon blue"><i class="ti ti-tool"></i></div>
                <div class="stat-num">23</div>
                <div class="stat-label">Alat dipinjam</div>
                <div class="stat-sub blue">Alat sedang dipinjam</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon gray"><i class="ti ti-refresh"></i></div>
                <div class="stat-num">8</div>
                <div class="stat-label">Selesai</div>
                <div class="stat-sub">Peminjaman dikembalikan</div>
            </div>
        </div>

        <!-- Two columns: Tasks + Log -->
        <div class="two-col">
            <!-- Tugas Prioritas -->
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Tugas Prioritas Hari Ini</span>
                    <button class="btn-sm">Lihat Semua</button>
                </div>
                <div class="task-header">
                    <span>Peminjam / Alat</span>
                    <span>Status</span>
                    <span>Jadwal</span>
                    <span>Sisa Waktu</span>
                </div>
                <div class="task-row">
                    <div>
                        <div class="task-name">Rizky Pratama</div>
                        <div class="task-sub">XI DKV1 · Proyektor BenQ M550</div>
                    </div>
                    <span class="badge badge-red"><i class="ti ti-arrow-back-up" style="font-size:9px"></i>
                        Pengembalian</span>
                    <span style="font-size:10px;color:#4b3a1a;">02 Mei 2025<br>08.30</span>
                    <span class="overdue">Terlambat<br>1j 30m</span>
                </div>
                <div class="task-row">
                    <div>
                        <div class="task-name">Rizky Pratama</div>
                        <div class="task-sub">XI DKV1 · Proyektor BenQ M550</div>
                    </div>
                    <span class="badge badge-red"><i class="ti ti-arrow-back-up" style="font-size:9px"></i>
                        Pengembalian</span>
                    <span style="font-size:10px;color:#4b3a1a;">05 Mei 2025<br>14.00</span>
                    <span class="overdue">Terlambat<br>1 Hari</span>
                </div>
                <div class="task-row">
                    <div>
                        <div class="task-name">Rizky Pratama</div>
                        <div class="task-sub">XI DKV1 · Proyektor BenQ M550</div>
                    </div>
                    <span class="badge badge-amber"><i class="ti ti-clock" style="font-size:9px"></i> Peminjaman</span>
                    <span style="font-size:10px;color:#4b3a1a;">14 Apr 2025<br>08.30</span>
                    <span class="pending">Menunggu<br>Ditinjau</span>
                </div>
                <div class="task-row">
                    <div>
                        <div class="task-name">Rizky Pratama</div>
                        <div class="task-sub">XI DKV1 · Proyektor BenQ M550</div>
                    </div>
                    <span class="badge badge-blue"><i class="ti ti-arrow-back-up" style="font-size:9px"></i>
                        Pengembalian</span>
                    <span style="font-size:10px;color:#4b3a1a;">03 Mei 2025<br>15.30</span>
                    <span class="ontime">Hari ini<br>15.30</span>
                </div>
            </div>

            <!-- Log Aktivitas -->
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Log Aktivitas</span>
                    <button class="btn-sm">Lihat Semua</button>
                </div>
                <div class="log-row">
                    <div class="log-icon ok"><i class="ti ti-circle-check"></i></div>
                    <div class="log-text">
                        <div class="log-title">Pengembalian berhasil</div>
                        <div class="log-desc">Aldo Lestari mengembalikan Proyektor Epson EB-E01</div>
                    </div>
                    <div class="log-time">2 menit lalu</div>
                </div>
                <div class="log-row">
                    <div class="log-icon info"><i class="ti ti-plus"></i></div>
                    <div class="log-text">
                        <div class="log-title">Pengajuan peminjaman baru</div>
                        <div class="log-desc">Radita mengajukan peminjaman Kamera Canon EOS 2000</div>
                    </div>
                    <div class="log-time">10 menit lalu</div>
                </div>
                <div class="log-row">
                    <div class="log-icon warn"><i class="ti ti-alert-triangle"></i></div>
                    <div class="log-text">
                        <div class="log-title">Terlambat mengembalikan</div>
                        <div class="log-desc">Ahmad Fauzan terlambat mengembalikan Proyektor BenQ M550</div>
                    </div>
                    <div class="log-time">55 menit lalu</div>
                </div>
                <div class="log-row">
                    <div class="log-icon red"><i class="ti ti-x"></i></div>
                    <div class="log-text">
                        <div class="log-title">Pengajuan ditolak</div>
                        <div class="log-desc">Pengajuan proyektor Epson EB-E01 oleh Budi Santoso ditolak</div>
                    </div>
                    <div class="log-time">2 jam lalu</div>
                </div>
            </div>
        </div>

        <!-- Bottom Row: Donut + Notifikasi -->
        <div class="bottom-row">
            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Ringkasan Status Alat</span>
                </div>
                <div class="donut-wrap">
                    <svg width="100" height="100" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="38" fill="none" stroke="#e0d5c0" stroke-width="16" />
                        <!-- Tersedia 41% -->
                        <circle cx="50" cy="50" r="38" fill="none" stroke="#22c55e" stroke-width="16"
                            stroke-dasharray="97.9 141.4" stroke-dashoffset="0" />
                        <!-- Dipinjam 30% -->
                        <circle cx="50" cy="50" r="38" fill="none" stroke="#3b82f6" stroke-width="16"
                            stroke-dasharray="71.6 167.7" stroke-dashoffset="-97.9" />
                        <!-- Terlambat 29% -->
                        <circle cx="50" cy="50" r="38" fill="none" stroke="#ef4444" stroke-width="16"
                            stroke-dasharray="69.1 170.2" stroke-dashoffset="-169.5" />
                        <text x="50" y="46" text-anchor="middle" font-size="11" fill="#6b5630">Total</text>
                        <text x="50" y="60" text-anchor="middle" font-size="18" font-weight="700"
                            fill="#2c1f0a">78</text>
                        <text x="50" y="72" text-anchor="middle" font-size="9" fill="#8b6f3a">Alat</text>
                    </svg>
                    <div class="donut-legend">
                        <div class="legend-item">
                            <span class="dot" style="background:#22c55e"></span>
                            Tersedia
                            <span class="legend-val">32</span>
                            <span class="legend-pct">(41%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="dot" style="background:#3b82f6"></span>
                            Dipinjam
                            <span class="legend-val">31</span>
                            <span class="legend-pct">(30%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="dot" style="background:#ef4444"></span>
                            Terlambat
                            <span class="legend-val">15</span>
                            <span class="legend-pct">(29%)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-header">
                    <span class="panel-title">Notifikasi</span>
                </div>
                <div class="notif-list">
                    <div class="notif-item red-n">
                        <i class="ti ti-alert-triangle" style="color:#dc2626"></i>
                        4 Alat belum dikembalikan tepat waktu
                    </div>
                    <div class="notif-item amber-n">
                        <i class="ti ti-file-plus" style="color:#d97706"></i>
                        4 Pengajuan peminjaman baru
                    </div>
                    <div class="notif-item yellow-n">
                        <i class="ti ti-user-check" style="color:#b45309"></i>
                        2 Peminjam menunggu konfirmasi
                    </div>
                    <div class="notif-item blue-n">
                        <i class="ti ti-arrow-back-up" style="color:#1d4ed8"></i>
                        4 Pengembalian menunggu konfirmasi
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>