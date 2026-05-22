<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard-user.css') }}">
</head>
<body>
    <div id="screen-app" class="screen">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sidebar-logo">
      <div class="sidebar-logo-icon"><img src="img/logo.png" alt=""></div>
      <div class="sidebar-logo-text">
        <span class="s-name">PIJAR</span>
      </div>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li><a class="nav-link active" data-page="dashboard" onclick="showPage('dashboard')"><i class="fa-solid fa-house"></i> Beranda</a></li>
        <li><a class="nav-link" data-page="daftar-alat" onclick="showPage('daftar-alat')"><i class="fa-solid fa-list"></i> Daftar alat</a></li>
        <li><a class="nav-link" data-page="riwayat" onclick="showPage('riwayat')"><i class="fa-solid fa-clock-rotate-left"></i> Riwayat</a></li>
      </ul>
    </nav>
    <div class="sidebar-user">
      <div class="sidebar-avatar">
        <img src="img/laptop,png.png" alt="Avatar">
      </div>
      <div class="sidebar-user-info">
        <span class="u-name">Aulia Rahma</span>
        <span class="u-class">XI PPLG</span>
      </div>
    </div>
  </aside>

  <!-- konten utama -->
  <main class="main-content">

    <!--  dasboard  -->
    <section id="page-dashboard" class="page active">
      <div class="page-header">
        <h1>Dashboard</h1>
        <p>Pinjam alat sekolah dengan mudah dan cepat</p>
      </div>

      <!-- Stat cards -->
      <div class="stat-cards">
        <div class="stat-card">
          <div class="stat-icon blue"><i class="fa-solid fa-briefcase"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Aktif</span>
            <span class="s-desc">Peminjaman sedang berlangsung</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon yellow"><i class="fa-regular fa-clock"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Diproses</span>
            <span class="s-desc">Peminjaman sedang berlangsung</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon green"><i class="fa-regular fa-circle-check"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Selesai</span>
            <span class="s-desc">Peminjaman sedang berlangsung</span>
          </div>
        </div>
        <div class="stat-card">
          <div class="stat-icon red"><i class="fa-regular fa-circle-xmark"></i></div>
          <div class="stat-info">
            <span class="s-num">2</span>
            <span class="s-label">Peminjaman Ditolak</span>
            <span class="s-desc">Peminjaman sedang berlangsung</span>
          </div>
        </div>
      </div>

      <!-- grid dashboard -->
      <div class="dash-grid">
        <div class="dash-left">

          <!-- pinjaman terbaru -->
          <div class="section-card">
            <div class="section-card-hd">
              <h3>Pinjaman Terbaru</h3>
              <button class="btn-outline-blue" onclick="showPage('riwayat')">Lihat Semua</button>
            </div>
            <div id="recent-loans"></div>
            <div class="view-all" onclick="showPage('riwayat')">
              <span>Lihat Semua riwayat</span>
              <i class="fa-solid fa-chevron-right" style="font-size:11px"></i>
            </div>
          </div>

          <!-- alat populer -->
          <div class="section-card">
            <div class="section-card-hd"><h3>Alat Populer</h3></div>
            <div class="pop-grid" id="popular-grid"></div>
          </div>

        </div><!-- dashboard kiri -->

        <div class="dash-right">

          <!-- chart donat-->
          <div class="section-card">
            <div class="chart-hd">
              <h3>Ringkasan peminjaman</h3>
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

          <!-- pengingat -->
          <div class="reminder-card">
            <div class="reminder-hd"><i class="fa-solid fa-bell"></i> Pengingat</div>
            <div class="reminder-title">Kembalikan alat tepat waktu</div>
            <div class="reminder-desc">Pastikan alat yang dipinjam dikembalikan sesuai dengan tanggal yang ditentukan</div>
          </div>

          <!-- chat admin -->
          <div class="help-card">
            <div class="help-icon"><i class="fa-solid fa-headset"></i></div>
            <h4>Butuh bantuan?</h4>
            <p>Jika ada kendala atau pertanyaan, silahkan hubungi admin</p>
            <button class="btn-help" onclick="openChat()">
              <i class="fa-solid fa-headset"></i> Hubungi Admin
            </button>
          </div>

        </div><!-- dashboard kanan -->
      </div>
    </section>

    <!--  tampilan daftar alat  -->
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

    <!-- pinjaman  -->
    <section id="page-pinjam-alat" class="page">
      <div class="page-header"><h1>Pinjam Alat</h1></div>
      <div class="pinjam-breadcrumb">Peminjaman &rsaquo; <span>Pinjam Alat</span></div>
      <div class="pinjam-grid">

        <!-- informasi alat di kiri -->
        <div class="pinjam-info-card">
          <h3>Informasi Alat</h3>
          <img class="pinjam-info-img" id="pinjam-img" src="img/benQMS550.png" alt="Proyektor">
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
            <span>Pastikan alat dalam kondisi baik saat diterima dan kembalikan sesuai dengan waktu yang ditentukan</span>
          </div>
        </div>

        <!-- form peminjaman alat -->
        <div class="pinjam-form-card">
          <h3>From Peminjaman</h3>
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
            <label>Julah Unit</label>
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
              <li><span>Alat wajib dikembalikan sesuai dengan tanggal yang ditentukan.</span></li>
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
            <span>Setelah pengajuan dikirim, permintaan akan diproses oleh admin. Kamu akan mendapatkan notifikasi setelah disetujui.</span>
          </div>
        </div>

      </div>
    </section>

    <!--  tampilan riwayat  -->
    <section id="page-riwayat" class="page">
      <div class="page-header">
        <h1>Riwayat Peminjaman</h1>
        <p>Kelola dan liat status semua peminjaman alat yang pernah anda ajukan</p>
      </div>
      <div class="riwayat-toolbar">
        <div class="riwayat-search"><i class="fa-solid fa-magnifying-glass"></i><input type="text" placeholder="Cari nama alat, lokasi, keperluan..."></div>
        <button class="filter-btn"><i class="fa-regular fa-calendar"></i> Semua tanggal <i class="fa-solid fa-chevron-down"></i></button>
        <button class="filter-btn"><i class="fa-solid fa-sliders"></i> Filter Lainnya <i class="fa-solid fa-chevron-down"></i></button>
      </div>

      <!-- status pemijaman -->
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
                <td><div class="table-alat"><div class="table-alat-img"><img src="img/InFocus IN1124.png" alt="Proyektor"></div><div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div></div></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09-30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15-10</span></td>
                <td>Kelas XI PPLG</td>
                <td>Kegiatan belajar</td>
                <td><span class="badge badge-diproses">● Diproses</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td><div class="table-alat"><div class="table-alat-img"><img src="img/Optoma HD146X.png" alt="Proyektor"></div><div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div></div></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09-30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15-10</span></td>
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

      <!-- riwayat pinjaman -->
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
                <td><div class="table-alat"><div class="table-alat-img"><img src="img/benQMS550.png" alt="Proyektor"></div><div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div></div></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09-30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15-10</span></td>
                <td>Kelas XI PPLG</td>
                <td>Kegiatan belajar</td>
                <td><span class="badge badge-selesai">● Selesai</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>2</td>
                <td><div class="table-alat"><div class="table-alat-img"><img src="img/Panasonic PT-LB425.png" alt="Proyektor"></div><div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div></div></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09-30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15-10</span></td>
                <td>Lab Komputer</td>
                <td>Praktikum</td>
                <td><span class="badge badge-selesai">● Selesai</span></td>
                <td><button class="btn-detail"><i class="fa-regular fa-eye"></i> Detail</button></td>
              </tr>
              <tr>
                <td>3</td>
                <td><div class="table-alat"><div class="table-alat-img"><img src="img/InFocus IN1124.png" alt="Proyektor"></div><div><div class="table-alat-name">Proyektor BenQ MS550</div><div class="table-alat-code">PA-001</div></div></div></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">09-30</span></td>
                <td>03 Mei 2026<br><span style="color:var(--color-muted)">15-10</span></td>
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

<!-- 
     Chat Hubungi Admin
 -->
<div class="chat-overlay" id="chat-overlay" onclick="overlayClickOutside(event)">
  <div class="chat-modal" onclick="event.stopPropagation()">

    <!-- Header -->
    <div class="chat-hd">
      <div class="chat-hd-info">
        <div class="chat-hd-avatar">
          <img src="https://ui-avatars.com/api/?name=Admin+PIJAR&background=5c3d1e&color=fff&size=38" alt="Admin">
          <span class="chat-online-dot" id="online-dot"></span>
        </div>
        <div class="chat-hd-text">
          <h4>Admin PIJAR</h4>
          <p id="admin-status-text">Menunggu koneksi...</p>
        </div>
      </div>
      <div class="chat-hd-actions">
        <button class="chat-hd-btn" onclick="clearChat()" title="Hapus riwayat chat">
          <i class="fa-solid fa-trash-can"></i>
        </button>
        <button class="chat-hd-btn" onclick="closeChat()" title="Tutup">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    </div>

    <!-- Status bar koneksi -->
    <div class="chat-status-bar" id="chat-status-bar">
      <i class="fa-solid fa-circle-exclamation"></i>
      <span id="chat-status-text">Menghubungkan ke server...</span>
    </div>

    <!-- Area pesan -->
    <div class="chat-msgs" id="chat-msgs">
      <div class="chat-date-sep">Hari ini</div>
      <!-- Pesan sambutan admin -->
      <div class="chat-msg admin" id="welcome-msg">
        <div class="chat-msg-avatar">
          <img src="https://ui-avatars.com/api/?name=Admin+PIJAR&background=5c3d1e&color=fff&size=28" alt="Admin">
        </div>
        <div class="chat-msg-body">
          <span class="chat-sender">Admin PIJAR</span>
          <div class="chat-bubble">Halo! Selamat datang di PIJAR 👋<br>Ada yang bisa kami bantu terkait peminjaman alat?</div>
          <span class="chat-meta" id="welcome-time">Sekarang</span>
        </div>
      </div>
    </div>

    <!-- balasan cepat -->
    <div class="chat-input-area">
      <div class="chat-quick-replies" id="quick-replies">
        <button class="quick-reply" onclick="sendQuickReply('Bagaimana cara meminjam alat?')">Cara pinjam alat</button>
        <button class="quick-reply" onclick="sendQuickReply('Cek status peminjaman saya')">Cek status</button>
        <button class="quick-reply" onclick="sendQuickReply('Syarat & ketentuan peminjaman')">Syarat & ketentuan</button>
        <button class="quick-reply" onclick="sendQuickReply('Jam operasional PIJAR')">Jam operasional</button>
      </div>
      <div class="chat-input-row">
        <textarea
          class="chat-input"
          id="chat-input"
          placeholder="Ketik pesan ke admin..."
          rows="1"
          onkeydown="chatKeydown(event)"
          oninput="autoResizeInput(this)"
        ></textarea>
        <button class="chat-send" id="chat-send-btn" onclick="sendUserMessage()" title="Kirim">
          <i class="fa-solid fa-paper-plane"></i>
        </button>
      </div>
    </div>

  </div>
</div>


<div class="toast" id="toast"></div>

<!-- 
     js
 -->
<script>
/* 
   navigasi antar tampilan
 */
function showScreen(id) {
  ['splash','login','register','app'].forEach(s => {
    const el = document.getElementById('screen-' + s);
    el.style.display = 'none';
  });
  const el = document.getElementById('screen-' + id);
  if (!el) return;
  el.style.display = (id === 'app') ? 'flex' : 'flex';
  if (id === 'app') {
    renderAll();
    setTimeout(initChart, 150);
  }
}


function showPage(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const p = document.getElementById('page-' + id);
  if (p) p.classList.add('active');

  const pageToNav = { dashboard: 0, 'daftar-alat': 1, 'pinjam-alat': 1, riwayat: 2 };
  const links = document.querySelectorAll('.nav-link');
  links.forEach(l => l.classList.remove('active'));
  const idx = pageToNav[id];
  if (links[idx]) links[idx].classList.add('active');
}

/* 
   autentifikasi
 */
function doLogin() {
  const nama = document.getElementById('login-nama').value.trim();
  const pass = document.getElementById('login-pass').value.trim();
  if (!nama || !pass) { toast('Mohon lengkapi semua field!', 'error'); return; }
  toast('Login berhasil! Selamat datang, ' + nama, 'success');
  setTimeout(() => showScreen('app'), 700);
}
function doRegister() {
  toast('Registrasi berhasil! Silakan login.', 'success');
  setTimeout(() => showScreen('login'), 800);
}

/* 
   data api
 */
const EQUIP_DATA = [
  { id:1, name:'InFocus IN1124',     stock:5, lumens:'3200', res:'XGA (1024x768)',  tech:'DLP',  img:'img/InFocus IN1124.png' },
  { id:2, name:'BenQ MS550',         stock:5, lumens:'3600', res:'SVGA (800x600)',  tech:'DLP',  img:'img/InFocus IN1124.png' },
  { id:3, name:'Optoma HD146X',      stock:5, lumens:'3200', res:'XGA (1024x768)',  tech:'DLP',  img:'img/InFocus IN1124.png' },
  { id:4, name:'ViewSonic PA503X',   stock:5, lumens:'3500', res:'WXGA (1024x768)', tech:'DLP',  img:'img/InFocus IN1124.png' },
  { id:5, name:'Panasonic PT-LB425', stock:5, lumens:'4000', res:'WXGA (1280x800)', tech:'LCD',  img:'img/InFocus IN1124.png' },
  { id:6, name:'InFocus IN1124',     stock:5, lumens:'3100', res:'XGA (1024x768)',  tech:'3LCD', img:'img/InFocus IN1124.png' },
];
const RECENT_LOANS = [
  { name:'Proyektor BenQ MS550', code:'PA-001', status:'diproses',  tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
  { name:'Proyektor BenQ MS550', code:'PA-001', status:'disetujui', tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
  { name:'Proyektor BenQ MS550', code:'PA-001', status:'selesai',   tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
  { name:'Proyektor BenQ MS550', code:'PA-001', status:'ditolak',   tgl:'03 Mei 2026 09:30', loc:'Ruang Kelas XI PPLG' },
];
const POPULAR_DATA = [
  { name:'Proyektor BenQ MS550', count:12, rank:1,  rankColor:'#ea580c' },
  { name:'Proyektor BenQ MS550', count:8,  rank:2,  rankColor:'#6b7280' },
  { name:'Proyektor BenQ MS550', count:6,  rank:3,  rankColor:'#92400e' },
  { name:'Proyektor BenQ MS550', count:5,  rank:4,  rankColor:'#374151' },
];

const BADGE_MAP = {
  diproses:  'badge-diproses',
  disetujui: 'badge-disetujui',
  selesai:   'badge-selesai',
  ditolak:   'badge-ditolak',
};
const BADGE_LABEL = { diproses:'Diproses', disetujui:'Disetujui', selesai:'Selesai', ditolak:'Ditolak' };

/* 
   render functions
 */
function renderAll() {
  renderEquipments(EQUIP_DATA);
  renderRecentLoans();
  renderPopular();
}

function renderEquipments(data) {
  const grid = document.getElementById('equip-grid');
  if (!grid) return;
  if (!data.length) { grid.innerHTML = '<p style="color:var(--color-muted);text-align:center;padding:40px 0">Tidak ada alat ditemukan.</p>'; return; }
  grid.innerHTML = data.map(eq => {
    const resParts = eq.res.match(/^(\S+)\s*(\(.*\))?$/);
    const resTop = resParts ? resParts[1] : eq.res;
    const resBot = resParts && resParts[2] ? resParts[2] : '';
    return `
      <div class="equip-card">
        <div class="equip-img-wrap">
          <img class="equip-img" src="${eq.img}" alt="${eq.name}" onerror="this.src='img/Panasonic PT-LB425.png'">
          <i class="fa-regular fa-heart equip-heart" onclick="toggleHeart(this)"></i>
        </div>
        <div class="equip-name-row">
          <span class="equip-name">${eq.name}</span>
          <span class="equip-stock">Stock : ${eq.stock}</span>
        </div>
        <div class="equip-specs">
          <div class="equip-spec">
            <i class="fa-regular fa-sun"></i>
            <div class="spec-val">${eq.lumens}</div>
            <div class="spec-lbl">Lumens</div>
          </div>
          <div class="equip-spec">
            <i class="fa-regular fa-desktop"></i>
            <div class="spec-val">${resTop}</div>
            <div class="spec-lbl">${resBot}</div>
          </div>
          <div class="equip-spec">
            <i class="fa-solid fa-microchip"></i>
            <div class="spec-val">${eq.tech}</div>
            <div class="spec-lbl">Technology</div>
          </div>
        </div>
        <button class="btn-pinjam" onclick="openPinjam(${eq.id})">Pinjam</button>
      </div>`;
  }).join('');
}

function filterEquip(q) {
  const filtered = EQUIP_DATA.filter(e => e.name.toLowerCase().includes(q.toLowerCase()));
  renderEquipments(filtered);
}

function renderRecentLoans() {
  const el = document.getElementById('recent-loans');
  if (!el) return;
  el.innerHTML = RECENT_LOANS.map(l => `
    <div class="loan-item">
      <div class="loan-img"><img src="img/Panasonic PT-LB425.png" alt="${l.name}"></div>
      <div class="loan-info">
        <div class="loan-name">${l.name}</div>
        <div class="loan-code">${l.code}&nbsp;<span class="badge ${BADGE_MAP[l.status]}">${BADGE_LABEL[l.status]}</span></div>
      </div>
      <div class="loan-dates">
        <span>${l.tgl.replace(' ','\n')}</span>
        <i class="fa-solid fa-arrow-right"></i>
        <span>${l.tgl.replace(' ','\n')}</span>
      </div>
      <div class="loan-loc">${l.loc.replace(' ','\n')}</div>
    </div>`).join('');
}

function renderPopular() {
  const el = document.getElementById('popular-grid');
  if (!el) return;
  el.innerHTML = POPULAR_DATA.map(p => `
    <div class="pop-item">
      <img src="img/Panasonic PT-LB425.png" alt="${p.name}">
      <div class="pop-name">${p.name}</div>
      <span class="pop-rank" style="background:${p.rankColor}">${p.rank}</span>
      <div class="pop-count">${p.count} kali dipinjam</div>
    </div>`).join('');
}

function toggleHeart(el) {
  el.classList.toggle('liked');
  if (el.classList.contains('liked')) {
    el.classList.remove('fa-regular'); el.classList.add('fa-solid');
  } else {
    el.classList.remove('fa-solid'); el.classList.add('fa-regular');
  }
}

/* 
    pijar
 */
function openPinjam(id) {
  const eq = EQUIP_DATA.find(e => e.id === id);
  if (eq) {
    document.getElementById('pinjam-img').src = eq.img;
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

/* 
    chart donat
 */
let chartInited = false;
function initChart() {
  if (chartInited || typeof ApexCharts === 'undefined') return;
  chartInited = true;
  const opts = {
    series: [1, 2, 8, 1],
    chart: { type:'donut', height:180, toolbar:{show:false}, sparkline:{enabled:false} },
    labels: ['Diproses','Disetujui','Selesai','Ditolak'],
    colors: ['#f59e0b','#3b82f6','#22c55e','#ef4444'],
    legend: { show:false },
    plotOptions: {
      pie: {
        donut: {
          size:'68%',
          labels: { show:false }
        },
        expandOnClick: false
      }
    },
    dataLabels: { enabled:false },
    stroke: { width:2, colors:['#e8e4d8'] },
    states: { hover:{ filter:{ type:'none' } }, active:{ filter:{ type:'none' } } },
    tooltip: {
      y: { formatter: (v) => v + ' Peminjaman' }
    }
  };
  const chart = new ApexCharts(document.getElementById('donut-chart'), opts);
  chart.render();
}

/* 
   notif toast 
 */
function toast(msg, type = '') {
  const el = document.getElementById('toast');
  el.textContent = msg;
  el.className = 'toast ' + type + ' show';
  clearTimeout(el._t);
  el._t = setTimeout(() => el.classList.remove('show'), 3200);
}

/* =========================================
   CHAT ADMIN — Real-time ke Server
   Mendukung: WebSocket / Long Polling / REST
========================================= */

/* ── Konfigurasi ──────────────────────────
   Ganti BASE_URL dengan URL backend nyata.
   Mode: 'websocket' | 'polling' | 'rest'
──────────────────────────────────────────── */
const CHAT_CONFIG = {
  mode:        'polling',          
  baseUrl:     '/api/chat',        
  wsUrl:       'wss://yourserver/ws/chat',  
  pollInterval: 3000,              
  userId:      'user_aulia_001',  
  userName:    'Aulia Rahma',
  userClass:   'XI PPLG',
};

/* ── State ─────────────────────────────── */
const CHAT_STATE = {
  open:        false,
  connected:   false,
  ws:          null,
  pollTimer:   null,
  lastMsgId:   0,
  unread:      0,
  messages:    [],               // [{id, role, text, time, read}]
  roomId:      null,
  adminOnline: false,
};

/* ── Waktu helper ─────────────────────── */
function chatTime() {
  return new Date().toLocaleTimeString('id-ID', { hour:'2-digit', minute:'2-digit' });
}

/* ── Buka / tutup modal ────────────────── */
function openChat() {
  document.getElementById('chat-overlay').classList.add('open');
  document.getElementById('chat-fab').style.display = 'none';
  CHAT_STATE.open = true;
  CHAT_STATE.unread = 0;
  document.getElementById('fab-badge').classList.add('hidden');
  document.getElementById('welcome-time').textContent = chatTime();
  if (!CHAT_STATE.connected) chatConnect();
  setTimeout(() => document.getElementById('chat-input').focus(), 200);
}

function closeChat() {
  document.getElementById('chat-overlay').classList.remove('open');
  document.getElementById('chat-fab').style.display = 'flex';
  CHAT_STATE.open = false;
}

function overlayClickOutside(e) {
  if (e.target === document.getElementById('chat-overlay')) closeChat();
}

/*  resize  */
function autoResizeInput(el) {
  el.style.height = 'auto';
  el.style.height = Math.min(el.scrollHeight, 90) + 'px';
}

function chatKeydown(e) {
  if (e.key === 'Enter' && !e.shiftKey) {
    e.preventDefault();
    sendUserMessage();
  }
}

/* chat scroll*/
function chatScrollBottom() {
  const msgs = document.getElementById('chat-msgs');
  msgs.scrollTop = msgs.scrollHeight;
}

/* render chat*/
function renderMessage({ role, text, time, read = false }) {
  const wrap = document.getElementById('chat-msgs');
  const div = document.createElement('div');
  div.className = 'chat-msg ' + (role === 'admin' ? 'admin' : 'user');

  if (role === 'admin') {
    div.innerHTML = `
      <div class="chat-msg-avatar">
        <img src="https://ui-avatars.com/api/?name=Admin+PIJAR&background=5c3d1e&color=fff&size=28" alt="Admin">
      </div>
      <div class="chat-msg-body">
        <span class="chat-sender">Admin PIJAR</span>
        <div class="chat-bubble">${text.replace(/\n/g,'<br>')}</div>
        <span class="chat-meta">${time}</span>
      </div>`;
  } else {
    const initials = CHAT_CONFIG.userName.split(' ').map(w => w[0]).join('').slice(0,2).toUpperCase();
    div.innerHTML = `
      <div class="chat-msg-body">
        <div class="chat-bubble">${text.replace(/\n/g,'<br>')}</div>
        <span class="chat-meta">
          ${time}
          ${read ? '<i class="fa-solid fa-check-double read-icon"></i>' : '<i class="fa-solid fa-check" style="color:#9ca3af"></i>'}
        </span>
      </div>
      <div class="chat-msg-avatar user-av">${initials}</div>`;
  }

  wrap.appendChild(div);
  chatScrollBottom();
  return div;
}

/* indikator admin */
function showAdminTyping() {
  removeAdminTyping();
  const wrap = document.getElementById('chat-msgs');
  const div = document.createElement('div');
  div.id = 'typing-indicator';
  div.className = 'chat-typing-row';
  div.innerHTML = `
    <img src="https://ui-avatars.com/api/?name=Admin+PIJAR&background=5c3d1e&color=fff&size=26" alt="">
    <div class="chat-typing-bubble"><span></span><span></span><span></span></div>`;
  wrap.appendChild(div);
  chatScrollBottom();
}
function removeAdminTyping() {
  const el = document.getElementById('typing-indicator');
  if (el) el.remove();
}

/* status bar apdet */
function setConnectedStatus(online) {
  CHAT_STATE.connected = online;
  CHAT_STATE.adminOnline = online;
  const bar  = document.getElementById('chat-status-bar');
  const text = document.getElementById('chat-status-text');
  const dot  = document.getElementById('online-dot');
  const adm  = document.getElementById('admin-status-text');
  if (online) {
    bar.className  = 'chat-status-bar connected';
    text.textContent = 'Terhubung — Admin siap membalas';
    dot.style.background = '#22c55e';
    adm.textContent = 'Online — siap membalas';
  } else {
    bar.className  = 'chat-status-bar';
    text.textContent = 'Terputus — mencoba menghubungkan ulang...';
    dot.style.background = '#9ca3af';
    adm.textContent = 'Offline';
  }
}

/* user kirim pesan */
function sendUserMessage() {
  const input = document.getElementById('chat-input');
  const text  = input.value.trim();
  if (!text) return;
  input.value = '';
  input.style.height = 'auto';

  const time = chatTime();
  const msg  = { role: 'user', text, time, read: false };
  CHAT_STATE.messages.push(msg);
  renderMessage(msg);


  document.getElementById('quick-replies').style.display = 'none';

  chatSendToServer(text);
}

function sendQuickReply(text) {
  document.getElementById('chat-input').value = text;
  sendUserMessage();
}

/*  Hapus history chat  */
function clearChat() {
  if (!confirm('Hapus semua riwayat chat?')) return;
  CHAT_STATE.messages = [];
  const wrap = document.getElementById('chat-msgs');
  // simpan hanya pemisah tanggal & pesan welcome
  const welcome = document.getElementById('welcome-msg');
  const sep = wrap.querySelector('.chat-date-sep');
  wrap.innerHTML = '';
  if (sep) wrap.appendChild(sep);
  if (welcome) wrap.appendChild(welcome);
  document.getElementById('quick-replies').style.display = 'flex';
}

/* 
   connect chat ke server
   ── sesuaikan mode nya ya backend ──
 */

function chatConnect() {
  if (CHAT_CONFIG.mode === 'websocket') {
    chatConnectWS();
  } else if (CHAT_CONFIG.mode === 'polling') {
    chatConnectPolling();
  } else {
    chatConnectREST();
  }
}

/* ── MODE 1: WebSocket ──────────────────── */
function chatConnectWS() {
  try {
    CHAT_STATE.ws = new WebSocket(CHAT_CONFIG.wsUrl);

    CHAT_STATE.ws.onopen = () => {
      setConnectedStatus(true);
      // Kirim identitas saat koneksi
      CHAT_STATE.ws.send(JSON.stringify({
        type:      'join',
        userId:    CHAT_CONFIG.userId,
        userName:  CHAT_CONFIG.userName,
        userClass: CHAT_CONFIG.userClass,
      }));
    };

    CHAT_STATE.ws.onmessage = (e) => {
      const data = JSON.parse(e.data);
      handleServerMessage(data);
    };

    CHAT_STATE.ws.onerror = () => setConnectedStatus(false);

    CHAT_STATE.ws.onclose = () => {
      setConnectedStatus(false);
      // Reconnect otomatis setelah 5 detik
      setTimeout(chatConnectWS, 5000);
    };
  } catch(err) {
    console.warn('[CHAT WS] Gagal:', err);
    setConnectedStatus(false);
  }
}

function chatSendToServer(text) {
  if (CHAT_CONFIG.mode === 'websocket' && CHAT_STATE.ws?.readyState === WebSocket.OPEN) {
    CHAT_STATE.ws.send(JSON.stringify({
      type:    'message',
      userId:  CHAT_CONFIG.userId,
      roomId:  CHAT_STATE.roomId,
      text,
    }));
  } else if (CHAT_CONFIG.mode === 'polling' || CHAT_CONFIG.mode === 'rest') {
    chatPOST(text);
  }
}

/* ── MODE 2: Long Polling ───────────────── */
function chatConnectPolling() {
  // Buat room chat terlebih dahulu
  chatCreateRoom().then(() => {
    setConnectedStatus(true);
    chatPollMessages();
  }).catch(() => {
    setConnectedStatus(false);
    setTimeout(chatConnectPolling, 5000);
  });
}

async function chatCreateRoom() {
  /*
    POST /api/chat/rooms
    Body: { userId, userName, userClass }
    Response: { roomId }
  */
  const res = await fetch(CHAT_CONFIG.baseUrl + '/rooms', {
    method:  'POST',
    headers: { 'Content-Type': 'application/json' },
    body:    JSON.stringify({
      userId:    CHAT_CONFIG.userId,
      userName:  CHAT_CONFIG.userName,
      userClass: CHAT_CONFIG.userClass,
    }),
  });
  const data = await res.json();
  CHAT_STATE.roomId = data.roomId;
}

async function chatPollMessages() {
  try {
    /*
      GET /api/chat/rooms/:roomId/messages?after=:lastMsgId
      Response: { messages: [{id, role, text, time}], adminOnline: bool }
    */
    const res  = await fetch(`${CHAT_CONFIG.baseUrl}/rooms/${CHAT_STATE.roomId}/messages?after=${CHAT_STATE.lastMsgId}`);
    const data = await res.json();

    if (data.adminOnline !== undefined) setConnectedStatus(data.adminOnline);

    (data.messages || []).forEach(msg => {
      if (msg.id > CHAT_STATE.lastMsgId) {
        CHAT_STATE.lastMsgId = msg.id;
        if (msg.role === 'admin') {
          removeAdminTyping();
          renderMessage({ role:'admin', text: msg.text, time: msg.time });
          if (!CHAT_STATE.open) {
            CHAT_STATE.unread++;
            const badge = document.getElementById('fab-badge');
            badge.textContent = CHAT_STATE.unread;
            badge.classList.remove('hidden');
          }
        }
        if (msg.role === 'typing') showAdminTyping();
      }
    });
  } catch(err) {
    setConnectedStatus(false);
  }

  // Lanjutkan polling
  CHAT_STATE.pollTimer = setTimeout(chatPollMessages, CHAT_CONFIG.pollInterval);
}

async function chatPOST(text) {
  try {
    /*
      POST /api/chat/rooms/:roomId/messages
      Body: { userId, text }
      Response: { messageId, status: 'sent' }
    */
    await fetch(`${CHAT_CONFIG.baseUrl}/rooms/${CHAT_STATE.roomId}/messages`, {
      method:  'POST',
      headers: { 'Content-Type': 'application/json' },
      body:    JSON.stringify({ userId: CHAT_CONFIG.userId, text }),
    });
  } catch(err) {
    toast('Gagal mengirim pesan. Cek koneksi internet.', 'error');
  }
}


/*  Handler pesan dari server  */
function handleServerMessage(data) {
  switch (data.type) {
    case 'message':
      removeAdminTyping();
      renderMessage({ role:'admin', text: data.text, time: chatTime() });
      if (!CHAT_STATE.open) {
        CHAT_STATE.unread++;
        const b = document.getElementById('fab-badge');
        b.textContent = CHAT_STATE.unread;
        b.classList.remove('hidden');
      }
      break;
    case 'typing':
      showAdminTyping();
      break;
    case 'stop_typing':
      removeAdminTyping();
      break;
    case 'read':
      // Admin sudah baca — update tanda centang biru
      document.querySelectorAll('.chat-msg.user .chat-meta .fa-check')
        .forEach(i => {
          i.className = 'fa-solid fa-check-double read-icon';
        });
      break;
    case 'admin_status':
      setConnectedStatus(data.online);
      break;
  }
}

/*  Init saat halaman app terbuka  */
function initChat() {
  document.getElementById('chat-fab').style.display = 'flex';
  document.getElementById('welcome-time').textContent = chatTime();
}
/* =========================================
   MOCK API CLASS (REST Integration Pattern)
========================================= */
class PijarAPI {
  constructor(baseUrl = '/api') { this.base = baseUrl; }

  async getEquipments(params = {}) {
    // Simulate: GET /api/equipment?category=proyektor
    return { success: true, data: EQUIP_DATA, total: EQUIP_DATA.length };
  }
  async getLoans(userId, params = {}) {
    // Simulate: GET /api/loans?user_id=xxx&status=all
    return { success: true, data: RECENT_LOANS, total: RECENT_LOANS.length };
  }
  async submitLoan(payload) {
    // Simulate: POST /api/loans
    return { success: true, message: 'Pengajuan berhasil', loan_id: 'LN-' + Date.now() };
  }
  async getLoanDetail(loanId) {
    // Simulate: GET /api/loans/:id
    return { success: true, data: RECENT_LOANS[0] };
  }
  async getDashboardStats(userId) {
    // Simulate: GET /api/dashboard?user_id=xxx
    return { success: true, data: { aktif:2, diproses:2, selesai:2, ditolak:2, total:12 } };
  }
}
const API = new PijarAPI();

/* 
   INIT
    */
document.addEventListener('DOMContentLoaded', () => {
  // Set today's date defaults
  const today = new Date().toISOString().split('T')[0];
  const tp = document.getElementById('tgl-pinjam');
  const tk = document.getElementById('tgl-kembali');
  if (tp) tp.value = today;
  if (tk) {
    const tom = new Date(); tom.setDate(tom.getDate()+1);
    tk.value = tom.toISOString().split('T')[0];
  }
});
</script>
</body>
</html>