<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>PIJAR — Meninjau Peminjaman</title>
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

/* MAIN AREA */
.content-wrap {
  flex: 1; display: flex; overflow: hidden;
  background: #f5f0e8;
  border-radius: 0;
}
.main {
  flex: 1; overflow-y: auto; padding: 24px;
  transition: all 0.25s;
}
.page-title { font-size: 20px; font-weight: 700; color: #2c1f0a; margin-bottom: 16px; }

/* STAT CARDS */
.stat-grid {
  display: grid; grid-template-columns: repeat(3, 1fr);
  gap: 12px; margin-bottom: 18px;
}
.stat-card {
  background: #fff; border-radius: 12px;
  padding: 14px 16px; border: 0.5px solid #e0d5c0;
  display: flex; align-items: center; gap: 14px;
}
.stat-icon {
  width: 36px; height: 36px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 16px; flex-shrink: 0;
}
.stat-icon.warn  { background: #fef3c7; color: #b45309; }
.stat-icon.ok    { background: #d1fae5; color: #047857; }
.stat-icon.red   { background: #fee2e2; color: #dc2626; }
.stat-info {}
.stat-num   { font-size: 22px; font-weight: 700; color: #1a1008; }
.stat-label { font-size: 11px; color: #6b5630; margin-top: 1px; }
.stat-sub   { font-size: 10px; margin-top: 3px; }
.stat-sub.amber  { color: #c8a84b; }
.stat-sub.green  { color: #059669; }
.stat-sub.red    { color: #dc2626; }

/* FILTER BAR */
.filter-bar {
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 14px; flex-wrap: wrap;
}
.search-wrap {
  position: relative; flex: 1; min-width: 200px;
}
.search-wrap i {
  position: absolute; left: 10px; top: 50%; transform: translateY(-50%);
  color: #a08840; font-size: 15px;
}
.search-wrap input {
  width: 100%; padding: 8px 12px 8px 34px;
  border: 0.5px solid #e0d5c0; border-radius: 8px;
  font-size: 12px; color: #2c1f0a; background: #fff;
  outline: none;
}
.search-wrap input:focus { border-color: #c8a84b; }
select {
  padding: 8px 12px; border: 0.5px solid #e0d5c0;
  border-radius: 8px; font-size: 12px; color: #4b3a1a;
  background: #fff; outline: none; cursor: pointer;
}
.date-input {
  padding: 8px 12px; border: 0.5px solid #e0d5c0;
  border-radius: 8px; font-size: 12px; color: #4b3a1a;
  background: #fff; outline: none;
}

/* TABLE */
.table-title { font-size: 13px; font-weight: 700; color: #2c1f0a; margin-bottom: 10px; }
.panel {
  background: #fff; border-radius: 12px;
  border: 0.5px solid #e0d5c0; overflow: hidden;
}
table {
  width: 100%; border-collapse: collapse;
  font-size: 12px;
}
thead tr { background: #f9f5ee; }
th {
  padding: 10px 12px; text-align: left;
  font-size: 11px; font-weight: 600;
  color: #8b6f3a; border-bottom: 0.5px solid #e8dcc8;
  white-space: nowrap;
}
td {
  padding: 10px 12px; border-bottom: 0.5px solid #f5eedf;
  color: #2c1f0a; vertical-align: middle;
}
tr:last-child td { border-bottom: none; }
tr.selected td { background: #fef9ee; }
tr:hover td { background: #f9f5ee; cursor: pointer; }

.td-primary { font-weight: 600; font-size: 12px; color: #2c1f0a; }
.td-sub { font-size: 10px; color: #8b6f3a; margin-top: 1px; }

/* BADGES */
.badge {
  display: inline-flex; align-items: center; gap: 3px;
  padding: 3px 8px; border-radius: 5px;
  font-size: 10px; font-weight: 600; white-space: nowrap;
}
.badge-amber  { background: #fef3c7; color: #92400e; }
.badge-green  { background: #d1fae5; color: #065f46; }
.badge-red    { background: #fee2e2; color: #991b1b; }
.badge-blue   { background: #dbeafe; color: #1e40af; }

.btn-detail {
  padding: 4px 12px; border-radius: 6px;
  border: 0.5px solid #c8a84b; color: #92400e;
  background: #fef9ee; font-size: 11px; font-weight: 600;
  cursor: pointer; transition: background 0.15s;
}
.btn-detail:hover { background: #fef3c7; }

/* PAGINATION */
.pagination {
  display: flex; align-items: center; justify-content: space-between;
  padding: 10px 16px; border-top: 0.5px solid #f0e8d5;
  font-size: 11px; color: #8b6f3a;
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

/* DETAIL PANEL */
.detail-panel {
  width: 0; min-width: 0; overflow: hidden;
  background: #fff; border-left: 0.5px solid #e0d5c0;
  transition: width 0.25s ease, min-width 0.25s ease;
  display: flex; flex-direction: column;
}
.detail-panel.open { width: 280px; min-width: 280px; overflow-y: auto; }
.detail-header {
  display: flex; align-items: center; justify-content: space-between;
  padding: 14px 16px; border-bottom: 0.5px solid #e8dcc8;
  position: sticky; top: 0; background: #fff; z-index: 1;
}
.detail-header-title { font-size: 13px; font-weight: 700; color: #2c1f0a; }
.close-btn {
  width: 24px; height: 24px; border-radius: 50%;
  background: #f3f0e8; border: none; cursor: pointer;
  display: flex; align-items: center; justify-content: center;
  color: #6b5630; font-size: 14px;
}
.close-btn:hover { background: #ebe5d8; }

.detail-section { padding: 14px 16px; border-bottom: 0.5px solid #f0e8d5; }
.section-label {
  display: flex; align-items: center; gap: 6px;
  font-size: 11px; font-weight: 700; color: #6b5630;
  margin-bottom: 10px; text-transform: uppercase; letter-spacing: 0.5px;
}
.section-label i { font-size: 13px; color: #c8a84b; }

.device-img {
  width: 100%; height: 90px;
  background: linear-gradient(135deg, #2c2c2c 0%, #111 100%);
  border-radius: 8px; margin-bottom: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 36px;
}

.detail-row {
  display: flex; justify-content: space-between;
  align-items: flex-start; gap: 8px;
  margin-bottom: 6px; font-size: 11px;
}
.detail-row:last-child { margin-bottom: 0; }
.detail-key { color: #8b6f3a; flex-shrink: 0; }
.detail-val { color: #2c1f0a; font-weight: 600; text-align: right; }

.action-buttons {
  padding: 14px 16px; display: flex; gap: 8px;
  position: sticky; bottom: 0; background: #fff;
  border-top: 0.5px solid #e8dcc8;
}
.btn-reject {
  flex: 1; padding: 9px; border-radius: 8px;
  border: 0.5px solid #fca5a5; background: #fff;
  color: #dc2626; font-size: 12px; font-weight: 600;
  cursor: pointer; display: flex; align-items: center;
  justify-content: center; gap: 5px;
}
.btn-reject:hover { background: #fee2e2; }
.btn-approve {
  flex: 1; padding: 9px; border-radius: 8px;
  border: none; background: #22c55e;
  color: #fff; font-size: 12px; font-weight: 600;
  cursor: pointer; display: flex; align-items: center;
  justify-content: center; gap: 5px;
}
.btn-approve:hover { background: #16a34a; }
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
    <div class="nav-item active">
      <i class="ti ti-file-text"></i> Meninjau Peminjaman
    </div>
    <a href="peninjauan-pengembalian.blade.php" class="nav-item">
      <i class="ti ti-arrow-back-up"></i> Meninjau Pengembalian
    </a>
    <a href="logo-aktivitas.blade.php" class="nav-item">
      <i class="ti ti-activity"></i> Log Aktivitas
    </a>
  </nav>
</aside>

<!-- CONTENT WRAP -->
<div class="content-wrap">
  <div class="main">
    <div class="page-title">Meninjau Peminjaman</div>

    <!-- Stat Cards -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-icon warn"><i class="ti ti-clock"></i></div>
        <div class="stat-info">
          <div class="stat-num">12</div>
          <div class="stat-label">Menunggu Tinjauan</div>
          <div class="stat-sub amber">Perlu segera ditinjau</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon ok"><i class="ti ti-circle-check"></i></div>
        <div class="stat-info">
          <div class="stat-num">5</div>
          <div class="stat-label">Disetujui hari ini</div>
          <div class="stat-sub green">Peminjaman disetujui</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon red"><i class="ti ti-circle-x"></i></div>
        <div class="stat-info">
          <div class="stat-num">2</div>
          <div class="stat-label">Ditolak hari ini</div>
          <div class="stat-sub red">Peminjaman ditolak</div>
        </div>
      </div>
    </div>

    <!-- Filter -->
    <div class="filter-bar">
      <div class="search-wrap">
        <i class="ti ti-search"></i>
        <input type="text" placeholder="Cari Nama Peminjam / Alat..." />
      </div>
      <select>
        <option>Semua Status</option>
        <option>Menunggu</option>
        <option>Disetujui</option>
        <option>Ditolak</option>
      </select>
      <input type="date" class="date-input" placeholder="Tanggal Pinjam" />
      <input type="date" class="date-input" placeholder="Tanggal Kembali" />
    </div>

    <!-- Table -->
    <div class="table-title">Daftar Pengajuan Peminjaman</div>
    <div class="panel">
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Peminjam</th>
            <th>Alat</th>
            <th>Tanggal dan Jam Pinjam</th>
            <th>Tanggal dan Jam Kembali</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <!-- Rows injected by JS -->
        </tbody>
      </table>
      <div class="pagination">
        <span id="pageInfo">Menampilkan 1–5 dari 20 data</span>
        <div class="page-btns">
          <div class="page-btn" onclick="changePage(-1)"><i class="ti ti-chevron-left"></i></div>
          <div class="page-btn active" id="pageNum">1</div>
          <div class="page-btn" onclick="changePage(1)"><i class="ti ti-chevron-right"></i></div>
        </div>
      </div>
    </div>
  </div>

  <!-- DETAIL PANEL -->
  <div class="detail-panel" id="detailPanel">
    <div class="detail-header">
      <span class="detail-header-title">Detail Pengajuan</span>
      <button class="close-btn" onclick="closeDetail()"><i class="ti ti-x"></i></button>
    </div>

    <div class="detail-section">
      <div class="section-label"><i class="ti ti-device-projector"></i> Informasi Alat</div>
      <div class="device-img">🎥</div>
      <div class="detail-row"><span class="detail-key">Nama Alat</span><span class="detail-val">Proyektor BenQ M550</span></div>
      <div class="detail-row"><span class="detail-key">ID Barang</span><span class="detail-val">PA-001</span></div>
      <div class="detail-row"><span class="detail-key">Kategori</span><span class="detail-val">Proyektor</span></div>
    </div>

    <div class="detail-section">
      <div class="section-label"><i class="ti ti-user"></i> Informasi Peminjam</div>
      <div class="detail-row"><span class="detail-key">Nama</span><span class="detail-val">Aulia Rahma</span></div>
      <div class="detail-row"><span class="detail-key">Kelas</span><span class="detail-val">XI PPLG</span></div>
      <div class="detail-row"><span class="detail-key">Keperluan</span><span class="detail-val">Presentasi</span></div>
      <div class="detail-row"><span class="detail-key">No. HP</span><span class="detail-val">0812-3456-7890</span></div>
    </div>

    <div class="detail-section">
      <div class="section-label"><i class="ti ti-calendar"></i> Informasi Peminjaman</div>
      <div class="detail-row"><span class="detail-key">Tanggal Pinjam</span><span class="detail-val">03 Mei 2026</span></div>
      <div class="detail-row"><span class="detail-key">Tanggal Kembali</span><span class="detail-val">03 Mei 2026</span></div>
      <div class="detail-row"><span class="detail-key">Jam Pinjam</span><span class="detail-val">09.30</span></div>
      <div class="detail-row"><span class="detail-key">Jam Kembali</span><span class="detail-val">15.10</span></div>
      <div class="detail-row">
        <span class="detail-key">Status</span>
        <span class="badge badge-amber">Menunggu Tinjauan</span>
      </div>
    </div>

    <div class="action-buttons">
      <button class="btn-reject"><i class="ti ti-x"></i> Tolak Pengajuan</button>
      <button class="btn-approve"><i class="ti ti-check"></i> Setujui Peminjaman</button>
    </div>
  </div>
</div>

<script>
const data = [
  { no:1, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Menunggu' },
  { no:2, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Menunggu' },
  { no:3, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Disetujui' },
  { no:4, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Disetujui' },
  { no:5, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Ditolak' },
  { no:6, name:'Rizky Pratama', kelas:'XI DKV1', alat:'Proyektor BenQ M550', pinjam:'03 Mei 2026\n09.30', kembali:'03 Mei 2026\n15.10', status:'Ditolak' },
];

let selectedRow = 0;
let currentPage = 1;

function badgeHtml(status) {
  if (status === 'Menunggu') return `<span class="badge badge-amber">${status}</span>`;
  if (status === 'Disetujui') return `<span class="badge badge-green">${status}</span>`;
  if (status === 'Ditolak')  return `<span class="badge badge-red">${status}</span>`;
  return `<span class="badge badge-blue">${status}</span>`;
}

function renderTable() {
  const tbody = document.getElementById('tableBody');
  tbody.innerHTML = data.map((d, i) => `
    <tr onclick="selectRow(${i})" class="${selectedRow === i ? 'selected' : ''}">
      <td>${d.no}</td>
      <td>
        <div class="td-primary">${d.name}</div>
        <div class="td-sub">${d.kelas}</div>
      </td>
      <td>${d.alat}</td>
      <td style="white-space:pre;font-size:11px;color:#4b3a1a">${d.pinjam}</td>
      <td style="white-space:pre;font-size:11px;color:#4b3a1a">${d.kembali}</td>
      <td>${badgeHtml(d.status)}</td>
      <td><button class="btn-detail" onclick="selectRow(${i});event.stopPropagation()">Detail</button></td>
    </tr>
  `).join('');
}

function selectRow(i) {
  selectedRow = i;
  document.getElementById('detailPanel').classList.add('open');
  renderTable();
}

function closeDetail() {
  document.getElementById('detailPanel').classList.remove('open');
}

function changePage(dir) {
  currentPage = Math.max(1, currentPage + dir);
  document.getElementById('pageNum').textContent = currentPage;
}

// Open detail on load to match screenshot
document.addEventListener('DOMContentLoaded', () => {
  renderTable();
  document.getElementById('detailPanel').classList.add('open');
});
</script>
</body>
</html>
