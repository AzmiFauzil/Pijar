<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PIJAR — Log Aktivitas</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css" />
<style>
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Segoe UI', system-ui, sans-serif;
  background: #1c1408;
  height: 100vh;
  display: flex;
  overflow: hidden;
}

/* SIDEBAR */
.sidebar {
  width: 200px; min-width: 200px;
  background: #1c1408;
  display: flex; flex-direction: column;
  color: #e8d5b0;
}
.sidebar-logo {
  display: flex; align-items: center; gap: 10px;
  padding: 22px 18px 18px;
  border-bottom: 0.5px solid rgba(200,168,75,0.2);
}
.logo-icon {
  width: 38px; height: 38px; background: #c8a84b;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 20px;
}
.logo-name { font-size: 15px; font-weight: 700; color: #c8a84b; letter-spacing: 1.5px; }
.sidebar-nav { flex: 1; padding: 14px 0; }
.nav-item {
  display: flex; align-items: center; gap: 10px;
  padding: 11px 18px; font-size: 13px; color: #8b7040;
  cursor: pointer; transition: background 0.15s, color 0.15s;
  border-left: 2px solid transparent; text-decoration: none;
}
.nav-item:hover { background: rgba(200,168,75,0.08); color: #e8d5b0; }
.nav-item.active { background: rgba(200,168,75,0.14); color: #c8a84b; border-left: 2px solid #c8a84b; }
.nav-item i { font-size: 17px; }

/* MAIN */
.main {
  flex: 1; overflow-y: auto;
  padding: 28px 28px;
  background: #f5f0e8;
}
.page-title { font-size: 20px; font-weight: 700; color: #2c1f0a; margin-bottom: 20px; }

/* LOG CARD */
.log-card {
  background: #fff;
  border-radius: 14px;
  border: 0.5px solid #e0d5c0;
  overflow: hidden;
  max-width: 760px;
}

.log-card-header {
  display: flex; align-items: center; gap: 12px;
  padding: 16px 20px;
  border-bottom: 0.5px solid #f0e8d5;
  background: #faf7f1;
}
.log-card-header-icon {
  width: 36px; height: 36px;
  background: #f0ebff;
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  color: #7c3aed; font-size: 18px;
}
.log-card-header-text {}
.log-card-title { font-size: 14px; font-weight: 700; color: #2c1f0a; }
.log-card-sub { font-size: 11px; color: #8b6f3a; margin-top: 2px; }

/* FILTER ROW */
.filter-bar {
  display: flex; align-items: center; gap: 10px;
  padding: 12px 20px;
  border-bottom: 0.5px solid #f0e8d5;
  background: #fff;
}
.search-wrap { position: relative; flex: 1; }
.search-wrap i {
  position: absolute; left: 10px; top: 50%;
  transform: translateY(-50%); color: #a08840; font-size: 14px;
}
.search-wrap input {
  width: 100%; padding: 7px 10px 7px 32px;
  border: 0.5px solid #e0d5c0; border-radius: 8px;
  font-size: 12px; color: #2c1f0a; background: #faf7f1;
  outline: none;
}
.search-wrap input:focus { border-color: #c8a84b; }
select {
  padding: 7px 12px; border: 0.5px solid #e0d5c0;
  border-radius: 8px; font-size: 12px; color: #4b3a1a;
  background: #faf7f1; outline: none; cursor: pointer;
}
.date-input {
  padding: 7px 10px; border: 0.5px solid #e0d5c0;
  border-radius: 8px; font-size: 12px; color: #4b3a1a;
  background: #faf7f1; outline: none;
}
.btn-filter {
  padding: 7px 16px; border-radius: 8px;
  background: #c8a84b; border: none;
  color: #fff; font-size: 12px; font-weight: 600;
  cursor: pointer; white-space: nowrap;
}
.btn-filter:hover { background: #b8942f; }

/* LOG ITEMS */
.log-list { padding: 6px 0; }

.log-item {
  display: flex; align-items: flex-start; gap: 14px;
  padding: 14px 20px;
  border-bottom: 0.5px solid #f5eedf;
  transition: background 0.12s;
  cursor: pointer;
}
.log-item:last-child { border-bottom: none; }
.log-item:hover { background: #faf7f1; }

.log-icon-wrap {
  position: relative; flex-shrink: 0; margin-top: 2px;
}
.log-icon {
  width: 36px; height: 36px;
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 17px;
}
.log-icon.green  { background: #d1fae5; color: #059669; }
.log-icon.amber  { background: #fef3c7; color: #d97706; }
.log-icon.red    { background: #fee2e2; color: #dc2626; }
.log-icon.purple { background: #ede9fe; color: #7c3aed; }

.status-dot {
  width: 8px; height: 8px; border-radius: 50%;
  position: absolute; bottom: -1px; right: -1px;
  border: 1.5px solid #fff;
}
.dot-green  { background: #22c55e; }
.dot-amber  { background: #f59e0b; }
.dot-red    { background: #ef4444; }
.dot-purple { background: #8b5cf6; }

.log-body { flex: 1; min-width: 0; }
.log-title { font-size: 13px; font-weight: 700; color: #2c1f0a; margin-bottom: 3px; }
.log-desc  { font-size: 12px; color: #6b5630; line-height: 1.5; }

.log-meta {
  display: flex; flex-direction: column;
  align-items: flex-end; gap: 6px; flex-shrink: 0;
}
.time-badge {
  display: inline-flex; align-items: center; gap: 4px;
  padding: 3px 9px; border-radius: 20px;
  font-size: 10px; font-weight: 600; white-space: nowrap;
}
.time-badge i { font-size: 10px; }
.time-green  { background: #d1fae5; color: #065f46; }
.time-amber  { background: #fef3c7; color: #92400e; }
.time-red    { background: #fee2e2; color: #991b1b; }
.time-purple { background: #ede9fe; color: #5b21b6; }

.btn-detail {
  padding: 4px 12px; border-radius: 6px;
  border: 0.5px solid #c8a84b; color: #92400e;
  background: #fef9ee; font-size: 11px; font-weight: 600;
  cursor: pointer;
}
.btn-detail:hover { background: #fef3c7; }

/* PAGINATION */
.pagination {
  display: flex; align-items: center; justify-content: space-between;
  padding: 12px 20px; border-top: 0.5px solid #f0e8d5;
  font-size: 11px; color: #8b6f3a; background: #faf7f1;
}
.page-btns { display: flex; gap: 6px; }
.page-btn {
  width: 28px; height: 28px; border-radius: 6px;
  border: 0.5px solid #e0d5c0; background: #fff;
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; cursor: pointer; color: #4b3a1a;
}
.page-btn:hover { background: #f5eedf; }
.page-btn.active { background: #c8a84b; color: #fff; border-color: #c8a84b; }

/* EMPTY STATE */
.empty { text-align: center; padding: 40px 20px; color: #a08840; font-size: 13px; }
.empty i { font-size: 36px; margin-bottom: 8px; display: block; color: #d5c4a0; }
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
    <a href="dashboard-petugas.blade.php" class="nav-item">
      <i class="ti ti-home"></i> Beranda
    </a>
    <a href="peninjauan-peminjaman.blade.php" class="nav-item">
      <i class="ti ti-file-text"></i> Meninjau Peminjaman
    </a>
    <a href="peninjauan-pengembalian.blade.php" class="nav-item">
      <i class="ti ti-arrow-back-up"></i> Meninjau Pengembalian
    </a>
    <div class="nav-item active">
      <i class="ti ti-activity"></i> Log Aktivitas
    </div>
  </nav>
</aside>

<!-- MAIN -->
<main class="main">
  <div class="page-title">Log Aktivitas</div>

  <div class="log-card">
    <!-- Card Header -->
    <div class="log-card-header">
      <div class="log-card-header-icon">
        <i class="ti ti-chart-line"></i>
      </div>
      <div class="log-card-header-text">
        <div class="log-card-title">Log Aktivitas</div>
        <div class="log-card-sub">Aktivitas terbaru di sistem</div>
      </div>
    </div>

    <!-- Filter -->
    <div class="filter-bar">
      <div class="search-wrap">
        <i class="ti ti-search"></i>
        <input type="text" id="searchInput" placeholder="Cari aktivitas..." oninput="renderLog()" />
      </div>
      <select id="filterType" onchange="renderLog()">
        <option value="">Semua Tipe</option>
        <option value="Pengembalian berhasil">Pengembalian berhasil</option>
        <option value="Pengajuan baru">Pengajuan baru</option>
        <option value="Terlambat">Terlambat</option>
        <option value="Pengajuan ditolak">Pengajuan ditolak</option>
      </select>
      <input type="date" class="date-input" />
      <button class="btn-filter" onclick="renderLog()">
        <i class="ti ti-filter" style="font-size:12px;vertical-align:-1px"></i> Filter
      </button>
    </div>

    <!-- Log List -->
    <div class="log-list" id="logList"></div>

    <!-- Pagination -->
    <div class="pagination">
      <span id="pageInfo">Menampilkan 1–8 dari 24 aktivitas</span>
      <div class="page-btns">
        <div class="page-btn" onclick="changePage(-1)"><i class="ti ti-chevron-left"></i></div>
        <div class="page-btn active" id="pageNum">1</div>
        <div class="page-btn" onclick="changePage(1)"><i class="ti ti-chevron-right"></i></div>
      </div>
    </div>
  </div>
</main>

<script>
const logs = [
  {
    type: 'Pengembalian berhasil',
    desc: 'Dewi Lestari mengembalikan proyektor Epson EB-E01',
    time: '2 menit lalu',
    theme: 'green',
    icon: 'ti-circle-check',
    dot: 'dot-green',
    timeCls: 'time-green'
  },
  {
    type: 'Pengajuan baru',
    desc: 'Raditya ningrat mengajukan peminjaman Kamera Canon EOS 2000',
    time: '10 menit lalu',
    theme: 'amber',
    icon: 'ti-file-plus',
    dot: 'dot-amber',
    timeCls: 'time-amber'
  },
  {
    type: 'Terlambat',
    desc: 'Ahmad Fauzan terlambat mengembalikan Proyektor BenQ M550',
    time: '35 menit lalu',
    theme: 'red',
    icon: 'ti-alert-triangle',
    dot: 'dot-red',
    timeCls: 'time-red'
  },
  {
    type: 'Pengajuan ditolak',
    desc: 'Pengajuan peminjaman proyektor Epson EB-E01 oleh Budi Santosa ditolak',
    time: '2 jam lalu',
    theme: 'purple',
    icon: 'ti-circle-x',
    dot: 'dot-purple',
    timeCls: 'time-purple'
  },
  {
    type: 'Pengembalian berhasil',
    desc: 'Sari Dewi mengembalikan kamera Canon EOS 250D',
    time: '3 jam lalu',
    theme: 'green',
    icon: 'ti-circle-check',
    dot: 'dot-green',
    timeCls: 'time-green'
  },
  {
    type: 'Pengajuan baru',
    desc: 'Bintang Ramadhan mengajukan peminjaman Tripod Manfrotto',
    time: '4 jam lalu',
    theme: 'amber',
    icon: 'ti-file-plus',
    dot: 'dot-amber',
    timeCls: 'time-amber'
  },
  {
    type: 'Terlambat',
    desc: 'Hendra Wijaya terlambat mengembalikan Laptop Asus VivoBook',
    time: '5 jam lalu',
    theme: 'red',
    icon: 'ti-alert-triangle',
    dot: 'dot-red',
    timeCls: 'time-red'
  },
  {
    type: 'Pengembalian berhasil',
    desc: 'Laila Nuraini mengembalikan Microphone Blue Yeti',
    time: '6 jam lalu',
    theme: 'green',
    icon: 'ti-circle-check',
    dot: 'dot-green',
    timeCls: 'time-green'
  },
];

let currentPage = 1;

function renderLog() {
  const search = document.getElementById('searchInput').value.toLowerCase();
  const filterType = document.getElementById('filterType').value;

  const filtered = logs.filter(l => {
    const matchSearch = l.desc.toLowerCase().includes(search) || l.type.toLowerCase().includes(search);
    const matchType = filterType === '' || l.type === filterType;
    return matchSearch && matchType;
  });

  const list = document.getElementById('logList');

  if (filtered.length === 0) {
    list.innerHTML = `<div class="empty"><i class="ti ti-mood-empty"></i>Tidak ada aktivitas ditemukan</div>`;
    document.getElementById('pageInfo').textContent = 'Tidak ada data';
    return;
  }

  list.innerHTML = filtered.map((l, i) => `
    <div class="log-item">
      <div class="log-icon-wrap">
        <div class="log-icon ${l.theme}">
          <i class="ti ${l.icon}"></i>
        </div>
        <span class="status-dot ${l.dot}"></span>
      </div>
      <div class="log-body">
        <div class="log-title">${l.type}</div>
        <div class="log-desc">${l.desc}</div>
      </div>
      <div class="log-meta">
        <span class="time-badge ${l.timeCls}">
          <i class="ti ti-clock"></i> ${l.time}
        </span>
        <button class="btn-detail">Detail</button>
      </div>
    </div>
  `).join('');

  document.getElementById('pageInfo').textContent =
    `Menampilkan 1–${filtered.length} dari ${filtered.length} aktivitas`;
}

function changePage(dir) {
  currentPage = Math.max(1, currentPage + dir);
  document.getElementById('pageNum').textContent = currentPage;
}

document.addEventListener('DOMContentLoaded', renderLog);
</script>
</body>
</html>
