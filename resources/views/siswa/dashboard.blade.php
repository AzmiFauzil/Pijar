<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PIJAR — Dashboard</title>

<!-- Icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous">

<!-- Font -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<!-- Chart -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.48.0/dist/apexcharts.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>

<!-- =============================================
     TAMPILAN UTAMA
============================================= -->
<div id="screen-app">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="sidebar-logo-icon"><img src="{{ asset('images/logo_pijar.png') }}" alt="Logo"></div>
      <!-- <div class="sidebar-logo-text">
        <span class="s-name">PIJAR</span>
      </div> -->
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li><a class="nav-link active" data-page="dashboard" onclick="showPage('dashboard')"><i class="fa-solid fa-house"></i> Beranda</a></li>
        <li><a class="nav-link" data-page="daftar-alat" onclick="showPage('daftar-alat')"><i class="fa-solid fa-list"></i> Daftar Alat</a></li>
        <li><a class="nav-link" data-page="riwayat" onclick="showPage('riwayat')"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat</a></li>
      </ul>
    </nav>
    <div class="sidebar-user">
      <div class="sidebar-avatar">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_user) }}&background=5c3d1e&color=fff&size=38" alt="Avatar">
      </div>
      <div class="sidebar-user-info">
        <span class="u-name">{{ Auth::user()->name }}</span>
        <span class="u-name">{{ Auth::user()->nama_user }}</span>
        <span class="u-class">{{ Auth::user()->kelas ?? 'Siswa' }}</span>
      </div>
    </div>
  </aside>

  <!-- KONTEN UTAMA -->
  <main class="main-content">

    <!-- ── DASHBOARD ── -->
    <section id="page-dashboard" class="page active">
      <div class="page-header">
        <h1>Dashboard</h1>
        <p>Selamat datang, {{ Auth::user()->nama_user }}. Pinjam alat sekolah dengan mudah dan cepat.</p>
      </div>

      <!-- Stat Cards -->
      <div class="stat-cards">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fa-solid fa-briefcase"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Aktif</span>
            <span class="s-desc">Sedang berlangsung</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon yellow"><i class="fa-regular fa-clock"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Diproses</span>
            <span class="s-desc">Menunggu persetujuan</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green"><i class="fa-regular fa-circle-check"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Selesai</span>
            <span class="s-desc">Sudah dikembalikan</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red"><i class="fa-regular fa-circle-xmark"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Ditolak</span>
            <span class="s-desc">Tidak disetujui</span>
          </div>
        </div>
      </div>

      <!-- Grid Dashboard -->
      <div class="dash-grid">
        <div class="dash-left">

          <!-- Pinjaman Terbaru -->
          <div class="section-card">
            <div class="section-card-hd">
              <h3>Pinjaman Terbaru</h3>
              <button class="btn-outline-blue" onclick="showPage('riwayat')">Lihat Semua</button>
            </div>
            <div id="recent-loans"></div>
            <div class="view-all" onclick="showPage('riwayat')">
              <span>Lihat Semua Riwayat</span>
              <i class="fa-solid fa-chevron-right" style="font-size:11px"></i>
            </div>
          </div>

          <!-- Alat Populer -->
          <div class="section-card">
            <div class="section-card-hd"><h3>Alat Populer</h3></div>
            <div class="pop-grid" id="popular-grid"></div>
          </div>

        </div><!-- /.dash-left -->

        <div class="dash-right">

          <!-- Donut Chart -->
          <div class="section-card">
            <div class="chart-hd">
              <h3>Ringkasan Peminjaman</h3>
              <select class="chart-sel">
                <option>Bulan ini</option>
                <option>Minggu ini</option>
              </select>
            </div>
            <div id="donut-chart-wrap" style="position:relative">
              <div id="donut-chart"></div>
              <div class="donut-center-lbl">
                <span class="dcl-total">Total</span>
                <span class="dcl-num">12</span>
                <span class="dcl-sub">Peminjaman</span>
              </div>
            </div>
            <div class="chart-legend">
              <div class="cleg-row"><div class="cleg-label"><div class="cleg-dot" style="background:#f59e0b"></div> Diproses</div><div class="cleg-val">1 (8%)</div></div>
              <div class="cleg-row"><div class="cleg-label"><div class="cleg-dot" style="background:#3b82f6"></div> Disetujui</div><div class="cleg-val">2 (17%)</div></div>
              <div class="cleg-row"><div class="cleg-label"><div class="cleg-dot" style="background:#22c55e"></div> Selesai</div><div class="cleg-val">8 (67%)</div></div>
              <div class="cleg-row"><div class="cleg-label"><div class="cleg-dot" style="background:#ef4444"></div> Ditolak</div><div class="cleg-val">1 (8%)</div></div>
            </div>
          </div>

          <!-- Pengingat -->
          <div class="reminder-card">
            <div class="reminder-hd"><i class="fa-solid fa-bell"></i> Pengingat</div>
            <div class="reminder-title">Kembalikan alat tepat waktu</div>
            <div class="reminder-desc">Pastikan alat yang dipinjam dikembalikan sesuai tanggal yang ditentukan.</div>
          </div>

          <!-- Hubungi Admin -->
          <div class="help-card">
            <div class="help-icon"><i class="fa-solid fa-headset"></i></div>
            <h4>Butuh bantuan?</h4>
            <p>Jika ada kendala atau pertanyaan, silahkan hubungi admin.</p>
            <button class="btn-help" onclick="openChat()">
              <i class="fa-solid fa-headset"></i> Hubungi Admin
            </button>
          </div>

        </div><!-- /.dash-right -->
      </div>
    </section>

    <!-- ── DAFTAR ALAT ── -->
    <section id="page-daftar-alat" class="page">
      <div class="daftar-hd">
        <div>
          <h1>Daftar Alat</h1>
          <h2>Proyektor</h2>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Cari nama alat" oninput="filterEquip(this.value)">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
      <div class="equip-grid" id="equip-grid"></div>
    </section>

    <!-- ── FORM PINJAM ALAT ── -->
    <section id="page-pinjam-alat" class="page">
      <div class="page-header"><h1>Pinjam Alat</h1></div>
      <div class="pinjam-breadcrumb">Peminjaman &rsaquo; <span>Pinjam Alat</span></div>
      <div class="pinjam-grid">

        <!-- Info Alat -->
        <div class="pinjam-info-card">
          <h3>Informasi Alat</h3>
          <img class="pinjam-info-img" id="pinjam-img" src="{{ asset('img/benQMS550.png') }}" alt="Proyektor">
          <div class="pinjam-info-name" id="pinjam-name">Proyektor BenQ MS550</div>
          <div class="pinjam-status-row">
            <span class="badge badge-tersedia"><i class="fa-solid fa-circle-check" style="margin-right:4px;font-size:10px"></i> Tersedia</span>
            <span class="pinjam-stok">Stok tersedia : <strong>5</strong> Unit</span>
          </div>
          <div style="font-size:13px;font-weight:700;margin-bottom:9px">Spesifikasi</div>
          <div class="spec-list">
            <div class="spec-row"><span class="dot">●</span><span class="sk">Kecerahan</span><span class="sv">: 3600 ANSI Lumens</span></div>
            <div class="spec-row"><span class="dot">●</span><span class="sk">Resolusi</span><span class="sv">: SVGA (800×600)</span></div>
            <div class="spec-row"><span class="dot">●</span><span class="sk">Aspect Ratio</span><span class="sv">: 4:3</span></div>
            <div class="spec-row"><span class="dot">●</span><span class="sk">Kontras</span><span class="sv">: 20.000 : 1</span></div>
            <div class="spec-row"><span class="dot">●</span><span class="sk">Warna</span><span class="sv">: 1.07 miliar warna</span></div>
            <div class="spec-row"><span class="dot">●</span><span class="sk">Berat</span><span class="sv">: ±2.3 kg</span></div>
          </div>
          <div class="pinjam-notice">
            <i class="fa-solid fa-circle-info"></i>
            <span>Pastikan alat dalam kondisi baik saat diterima dan kembalikan sesuai waktu yang ditentukan.</span>
          </div>
        </div>

        <!-- Form Peminjaman -->
        <div class="pinjam-form-card">
          <h3>Form Peminjaman</h3>
          <div class="form-row">
            <div class="form-group">
              <label>Tanggal Pinjam</label>
              <div class="form-ctrl"><input type="date" id="tgl-pinjam"><i class="fa-regular fa-calendar"></i></div>
            </div>
            <div class="form-group">
              <label>Tanggal Kembali</label>
              <div class="form-ctrl"><input type="date" id="tgl-kembali"><i class="fa-regular fa-calendar"></i></div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Jam Pinjam</label>
              <div class="form-ctrl"><input type="time" value="08:00"></div>
            </div>
            <div class="form-group">
              <label>Jam Kembali</label>
              <div class="form-ctrl"><input type="time" value="16:00"></div>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:16px">
            <label>Jumlah Unit</label>
            <div class="form-ctrl">
              <select><option>1 Unit</option><option>2 Unit</option><option>3 Unit</option><option>4 Unit</option><option>5 Unit</option></select>
              <i class="fa-solid fa-chevron-down" style="pointer-events:none"></i>
            </div>
          </div>
          <div class="form-group" style="margin-bottom:4px">
            <label>Keterangan</label>
            <textarea class="form-textarea" id="ket-textarea" placeholder="Jelaskan keterangan peminjaman alat..." maxlength="200" oninput="document.getElementById('char-cnt').textContent=this.value.length"></textarea>
            <div class="form-char"><span id="char-cnt">0</span> / 200</div>
          </div>
          <div class="syarat-box">
            <h4>Syarat &amp; Ketentuan</h4>
            <ul>
              <li><span>Alat harus digunakan dengan baik dan bertanggung jawab.</span></li>
              <li><span>Dilarang meminjamkan alat kepada pihak lain.</span></li>
              <li><span>Alat wajib dikembalikan sesuai tanggal yang ditentukan.</span></li>
              <li><span>Jika terjadi kerusakan atau kehilangan, peminjam wajib mengganti.</span></li>
            </ul>
          </div>
          <div class="agree-row">
            <input type="checkbox" id="agree-chk">
            <label for="agree-chk">Saya setuju dengan syarat dan ketentuan yang berlaku</label>
          </div>
          <div class="form-actions">
            <button class="btn-batal" onclick="showPage('daftar-alat')">Batal</button>
            <button class="btn-ajukan" onclick="submitPinjam()"><i class="fa-solid fa-paper-plane"></i> Ajukan Peminjaman</button>
          </div>
          <div class="form-footer">
            <i class="fa-solid fa-circle-info"></i>
            <span>Setelah pengajuan dikirim, permintaan akan diproses oleh admin. Kamu akan mendapat notifikasi setelah disetujui.</span>
          </div>
        </div>

      </div>
    </section>

    <!-- ── RIWAYAT ── -->
    <section id="page-riwayat" class="page">
      <div class="page-header">
        <h1>Riwayat Peminjaman</h1>
        <p>Kelola dan lihat status semua peminjaman alat yang pernah anda ajukan.</p>
      </div>
      <div class="riwayat-toolbar">
        <div class="riwayat-search"><i class="fa-solid fa-magnifying-glass"></i><input type="text" placeholder="Cari nama alat, lokasi, keperluan..."></div>
        <button class="filter-btn"><i class="fa-regular fa-calendar"></i> Semua tanggal <i class="fa-solid fa-chevron-down"></i></button>
        <button class="filter-btn"><i class="fa-solid fa-sliders"></i> Filter Lainnya <i class="fa-solid fa-chevron-down"></i></button>
      </div>

      <!-- Peminjaman Aktif -->
      <div class="riwayat-sec">
        <div class="riwayat-sec-hd">
          <div class="riwayat-sec-title">
            <i class="fa-regular fa-clock" style="color:#d97706;font-size:16px"></i>
            <div>
              <h3>Peminjaman Aktif</h3>
              <p>Menampilkan peminjaman yang masih dalam proses atau sedang berlangsung</p>
            </div>
          </div>
          <span class="badge-count active">2 Peminjaman Aktif</span>
        </div>
        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr><th>No</th><th>Alat</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Lokasi</th><th>Keperluan</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <div class="table-alat">
                    <div class="table-alat-img"><img src="{{ asset('img/InFocus IN1124.png') }}" alt="Proyektor"></div>
                    <div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div>
                  </div>
                </td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09:30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15:10</span></td>
                <td>Kelas XI PPLG</td>
                <td>Kegiatan belajar</td>
                <td><span class="badge badge-diproses">● Diproses</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <div class="table-alat">
                    <div class="table-alat-img"><img src="{{ asset('img/Optoma HD146X.png') }}" alt="Proyektor"></div>
                    <div><div class="table-alat-name">Proyektor Optoma HD146X</div><div class="table-alat-code">PA-002</div></div>
                  </div>
                </td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09:30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15:10</span></td>
                <td>Lab Komputer</td>
                <td>Praktikum</td>
                <td><span class="badge badge-disetujui">● Disetujui</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
            </tbody>
          </table>
          <div class="table-footer"><span>Menampilkan 1 - 2 dari 2 data</span></div>
        </div>
      </div>

      <!-- Riwayat Selesai & Ditolak -->
      <div class="riwayat-sec">
        <div class="riwayat-sec-hd">
          <div class="riwayat-sec-title">
            <i class="fa-regular fa-rectangle-list" style="color:#2563eb;font-size:16px"></i>
            <div>
              <h3>Riwayat Peminjaman (selesai &amp; ditolak)</h3>
              <p>Menampilkan peminjaman yang sudah selesai atau ditolak</p>
            </div>
          </div>
          <span class="badge-count history">10 Riwayat</span>
        </div>
        <div class="table-wrap">
          <table class="data-table">
            <thead>
              <tr><th>No</th><th>Alat</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Lokasi</th><th>Keperluan</th><th>Status</th><th>Aksi</th></tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <div class="table-alat">
                    <div class="table-alat-img"><img src="{{ asset('img/benQMS550.png') }}" alt="Proyektor"></div>
                    <div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div>
                  </div>
                </td>
                <td>01 Mei 2026<br><span style="color:var(--color-muted)">09:30</span></td>
                <td>01 Mei 2026<br><span style="color:var(--color-muted)">15:10</span></td>
                <td>Kelas XI PPLG</td>
                <td>Kegiatan belajar</td>
                <td><span class="badge badge-selesai">● Selesai</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td>
                  <div class="table-alat">
                    <div class="table-alat-img"><img src="{{ asset('img/Panasonic PT-LB425.png') }}" alt="Proyektor"></div>
                    <div><div class="table-alat-name">Proyektor Panasonic PT-LB425</div><div class="table-alat-code">PA-003</div></div>
                  </div>
                </td>
                <td>28 Apr 2026<br><span style="color:var(--color-muted)">09:30</span></td>
                <td>28 Apr 2026<br><span style="color:var(--color-muted)">15:10</span></td>
                <td>Lab Komputer</td>
                <td>Praktikum</td>
                <td><span class="badge badge-selesai">● Selesai</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>3</td>
                <td>
                  <div class="table-alat">
                    <div class="table-alat-img"><img src="{{ asset('img/InFocus IN1124.png') }}" alt="Proyektor"></div>
                    <div><div class="table-alat-name">Proyektor InFocus IN1124</div><div class="table-alat-code">PA-004</div></div>
                  </div>
                </td>
                <td>25 Apr 2026<br><span style="color:var(--color-muted)">09:30</span></td>
                <td>25 Apr 2026<br><span style="color:var(--color-muted)">15:10</span></td>
                <td>Lab Komputer</td>
                <td>Praktikum</td>
                <td><span class="badge badge-ditolak">● Ditolak</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
            </tbody>
          </table>
          <div class="table-footer">
            <span>Menampilkan 1 - 3 dari 7 data</span>
            <div class="table-pagination">
              <button><i class="fa-solid fa-chevron-left"></i></button>
              <button><i class="fa-solid fa-chevron-right"></i></button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
</div>

<!-- =============================================
     CHAT MODAL — Hubungi Admin
============================================= -->
<div class="chat-overlay" id="chat-overlay" onclick="overlayClickOutside(event)">
  <div class="chat-modal" onclick="event.stopPropagation()">

    <!-- Header -->
    <div class="chat-hd">
      <div class="chat-hd-info">
        <div class="chat-hd-icon">
          <img src="https://ui-avatars.com/api/?name=Admin+PIJAR&background=5c3d1e&color=fff&size=38" alt="Admin">
        </div>
        <div class="chat-hd-text">
          <h4>Admin PIJAR</h4>
          <p id="admin-status-text">Menunggu koneksi...</p>
        </div>
      </div>
      <button class="chat-hd-close" onclick="closeChat()"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <!-- Area Pesan -->
    <div class="chat-msgs" id="chat-msgs">
      <div class="chat-msg bot">
        <div class="chat-avatar"><i class="fa-solid fa-headset"></i></div>
        <div class="chat-bubble">Halo! Selamat datang di PIJAR 👋<br>Ada yang bisa kami bantu terkait peminjaman alat?</div>
      </div>
    </div>

    <!-- Balasan Cepat -->
    <div class="chat-quick-replies" id="quick-replies">
      <button class="quick-reply" onclick="sendQuickReply('Bagaimana cara meminjam alat?')">Cara pinjam alat</button>
      <button class="quick-reply" onclick="sendQuickReply('Cek status peminjaman saya')">Cek status</button>
      <button class="quick-reply" onclick="sendQuickReply('Syarat & ketentuan peminjaman')">Syarat &amp; ketentuan</button>
      <button class="quick-reply" onclick="sendQuickReply('Jam operasional PIJAR')">Jam operasional</button>
    </div>

    <!-- Input -->
    <div class="chat-input-wrap">
      <input class="chat-input" id="chat-input" type="text" placeholder="Ketik pesan ke admin..." onkeydown="chatKeydown(event)">
      <button class="chat-send" onclick="sendUserMessage()"><i class="fa-solid fa-paper-plane"></i></button>
    </div>

  </div>
</div>

<!-- FAB Chat -->
<button class="chat-fab" id="chat-fab" onclick="openChat()" title="Hubungi Admin">
  <i class="fa-solid fa-headset"></i>
  <span class="fab-badge hidden" id="fab-badge">0</span>
</button>

<!-- Toast Notifikasi -->
<div class="toast" id="toast"></div>

<!-- =============================================
     JAVASCRIPT
============================================= -->
<script>
/* ── Navigasi Halaman ── */
function showPage(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const p = document.getElementById('page-' + id);
  if (p) p.classList.add('active');

  const pageToNav = { dashboard: 0, 'daftar-alat': 1, 'pinjam-alat': 1, riwayat: 2 };
  document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
  const links = document.querySelectorAll('.nav-link');
  const idx = pageToNav[id];
  if (links[idx]) links[idx].classList.add('active');
}

/* ── Data ── */
const EQUIP_DATA = [
  { id:1, name:'InFocus IN1124',     stock:5, lumens:'3200', res:'XGA (1024x768)',  tech:'DLP',  img:'{{ asset("img/InFocus IN1124.png") }}' },
  { id:2, name:'BenQ MS550',         stock:5, lumens:'3600', res:'SVGA (800x600)',  tech:'DLP',  img:'{{ asset("img/benQMS550.png") }}' },
  { id:3, name:'Optoma HD146X',      stock:5, lumens:'3200', res:'XGA (1024x768)',  tech:'DLP',  img:'{{ asset("img/Optoma HD146X.png") }}' },
  { id:4, name:'ViewSonic PA503X',   stock:5, lumens:'3500', res:'WXGA (1280x800)', tech:'DLP',  img:'{{ asset("img/InFocus IN1124.png") }}' },
  { id:5, name:'Panasonic PT-LB425', stock:5, lumens:'4000', res:'WXGA (1280x800)', tech:'LCD',  img:'{{ asset("img/Panasonic PT-LB425.png") }}' },
  { id:6, name:'InFocus IN1124 II',  stock:5, lumens:'3100', res:'XGA (1024x768)',  tech:'3LCD', img:'{{ asset("img/InFocus IN1124.png") }}' },
];

const RECENT_LOANS = [
  { name:'Proyektor BenQ MS550',    code:'PA-001', status:'diproses',  tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
  { name:'Proyektor BenQ MS550',    code:'PA-001', status:'disetujui', tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
  { name:'Proyektor Optoma HD146X', code:'PA-002', status:'selesai',   tgl:'01 Mei 2026 09:30', loc:'Lab Komputer' },
  { name:'Proyektor InFocus IN1124',code:'PA-003', status:'ditolak',   tgl:'28 Apr 2026 09:30', loc:'Lab Komputer' },
];

const POPULAR_DATA = [
  { name:'BenQ MS550',         count:12, rank:1, rankColor:'#ea580c' },
  { name:'Optoma HD146X',      count:8,  rank:2, rankColor:'#6b7280' },
  { name:'InFocus IN1124',     count:6,  rank:3, rankColor:'#92400e' },
  { name:'Panasonic PT-LB425', count:5,  rank:4, rankColor:'#374151' },
];

const BADGE_MAP   = { diproses:'badge-diproses', disetujui:'badge-disetujui', selesai:'badge-selesai', ditolak:'badge-ditolak' };
const BADGE_LABEL = { diproses:'Diproses', disetujui:'Disetujui', selesai:'Selesai', ditolak:'Ditolak' };

/* ── Render ── */
function renderAll() {
  renderEquipments(EQUIP_DATA);
  renderRecentLoans();
  renderPopular();
}

function renderEquipments(data) {
  const grid = document.getElementById('equip-grid');
  if (!grid) return;
  if (!data.length) {
    grid.innerHTML = '<p style="color:var(--color-muted);text-align:center;padding:40px 0">Tidak ada alat ditemukan.</p>';
    return;
  }
  grid.innerHTML = data.map(eq => {
    const resParts = eq.res.match(/^(\S+)\s*(\(.*\))?$/);
    const resTop = resParts ? resParts[1] : eq.res;
    const resBot = resParts && resParts[2] ? resParts[2] : '';
    return `
      <div class="equip-card">
        <div class="equip-img-wrap">
          <img class="equip-img" src="${eq.img}" alt="${eq.name}">
          <i class="fa-regular fa-heart equip-heart" onclick="toggleHeart(this)"></i>
        </div>
        <div class="equip-name-row">
          <span class="equip-name">${eq.name}</span>
          <span class="equip-stock">Stok : ${eq.stock}</span>
        </div>
        <div class="equip-specs">
          <div class="equip-spec"><i class="fa-regular fa-sun"></i><div class="spec-val">${eq.lumens}</div><div class="spec-lbl">Lumens</div></div>
          <div class="equip-spec"><i class="fa-regular fa-desktop"></i><div class="spec-val">${resTop}</div><div class="spec-lbl">${resBot}</div></div>
          <div class="equip-spec"><i class="fa-solid fa-microchip"></i><div class="spec-val">${eq.tech}</div><div class="spec-lbl">Technology</div></div>
        </div>
        <button class="btn-pinjam" onclick="openPinjam(${eq.id})">Pinjam</button>
      </div>`;
  }).join('');
}

function filterEquip(q) {
  renderEquipments(EQUIP_DATA.filter(e => e.name.toLowerCase().includes(q.toLowerCase())));
}

function renderRecentLoans() {
  const el = document.getElementById('recent-loans');
  if (!el) return;
  el.innerHTML = RECENT_LOANS.map(l => `
    <div class="loan-item">
      <div class="loan-img"><img src="{{ asset('img/Panasonic PT-LB425.png') }}" alt="${l.name}"></div>
      <div class="loan-info">
        <div class="loan-name">${l.name}</div>
        <div class="loan-code">${l.code}&nbsp;<span class="badge ${BADGE_MAP[l.status]}">${BADGE_LABEL[l.status]}</span></div>
      </div>
      <div class="loan-dates">
        <span>${l.tgl}</span>
        <i class="fa-solid fa-arrow-right" style="font-size:10px"></i>
        <span>${l.tgl}</span>
      </div>
      <div class="loan-loc">${l.loc}</div>
    </div>`).join('');
}

function renderPopular() {
  const el = document.getElementById('popular-grid');
  if (!el) return;
  el.innerHTML = POPULAR_DATA.map(p => `
    <div class="pop-item">
      <img src="{{ asset('img/Panasonic PT-LB425.png') }}" alt="${p.name}">
      <div class="pop-name">${p.name}</div>
      <span class="pop-rank" style="background:${p.rankColor}">${p.rank}</span>
      <div class="pop-count">${p.count}x dipinjam</div>
    </div>`).join('');
}

function toggleHeart(el) {
  el.classList.toggle('liked');
  el.classList.toggle('fa-regular', !el.classList.contains('liked'));
  el.classList.toggle('fa-solid',   el.classList.contains('liked'));
}

/* ── Form Pinjam ── */
function openPinjam(id) {
  const eq = EQUIP_DATA.find(e => e.id === id);
  if (eq) {
    document.getElementById('pinjam-img').src  = eq.img;
    document.getElementById('pinjam-name').textContent = 'Proyektor ' + eq.name;
  }
  showPage('pinjam-alat');
}

function submitPinjam() {
  const agree = document.getElementById('agree-chk');
  if (!agree.checked) { toast('Harap setujui syarat dan ketentuan!', 'error'); return; }
  const d1 = document.getElementById('tgl-pinjam').value;
  const d2 = document.getElementById('tgl-kembali').value;
  if (!d1 || !d2) { toast('Tanggal pinjam dan kembali harus diisi!', 'error'); return; }
  toast('Pengajuan peminjaman berhasil dikirim! 🎉', 'success');
  setTimeout(() => { agree.checked = false; showPage('riwayat'); }, 1000);
}

/* ── Donut Chart ── */
let chartInited = false;
function initChart() {
  if (chartInited || typeof ApexCharts === 'undefined') return;
  chartInited = true;
  new ApexCharts(document.getElementById('donut-chart'), {
    series: [1, 2, 8, 1],
    chart: { type:'donut', height:180, toolbar:{show:false} },
    labels: ['Diproses','Disetujui','Selesai','Ditolak'],
    colors: ['#f59e0b','#3b82f6','#22c55e','#ef4444'],
    legend: { show:false },
    plotOptions: { pie: { donut: { size:'68%', labels:{ show:false } }, expandOnClick:false } },
    dataLabels: { enabled:false },
    stroke: { width:2, colors:['#e8e4d8'] },
    states: { hover:{ filter:{ type:'none' } }, active:{ filter:{ type:'none' } } },
    tooltip: { y: { formatter: v => v + ' Peminjaman' } },
  }).render();
}

/* ── Chat ── */
function openChat() {
  document.getElementById('chat-overlay').classList.add('open');
  document.getElementById('chat-fab').style.display = 'none';
}
function closeChat() {
  document.getElementById('chat-overlay').classList.remove('open');
  document.getElementById('chat-fab').style.display = 'flex';
}
function overlayClickOutside(e) {
  if (e.target === document.getElementById('chat-overlay')) closeChat();
}
function chatKeydown(e) {
  if (e.key === 'Enter') { e.preventDefault(); sendUserMessage(); }
}
function sendUserMessage() {
  const input = document.getElementById('chat-input');
  const text  = input.value.trim();
  if (!text) return;
  input.value = '';
  const wrap = document.getElementById('chat-msgs');
  const div  = document.createElement('div');
  div.className = 'chat-msg user';
  div.innerHTML = `<div class="chat-bubble">${text}</div>`;
  wrap.appendChild(div);
  wrap.scrollTop = wrap.scrollHeight;
  document.getElementById('quick-replies').style.display = 'none';
}
function sendQuickReply(text) {
  document.getElementById('chat-input').value = text;
  sendUserMessage();
}

/* ── Toast ── */
function toast(msg, type = '') {
  const el = document.getElementById('toast');
  el.textContent = msg;
  el.className = 'toast ' + type + ' show';
  clearTimeout(el._t);
  el._t = setTimeout(() => el.classList.remove('show'), 3200);
}

/* ── Init ── */
document.addEventListener('DOMContentLoaded', () => {
  renderAll();
  setTimeout(initChart, 150);

  const today = new Date().toISOString().split('T')[0];
  const tp = document.getElementById('tgl-pinjam');
  const tk = document.getElementById('tgl-kembali');
  if (tp) tp.value = today;
  if (tk) {
    const tom = new Date();
    tom.setDate(tom.getDate() + 1);
    tk.value = tom.toISOString().split('T')[0];
  }
});
</script>
</body>
</html>