<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Alat</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard-admin.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
  
  <style>
    .alert-success {
      padding: 15px;
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
      border-radius: 5px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="grid">

    <header class="header">
      <div class="menu" onclick="openSidebar()">
        <span class="material-symbols-outlined">menu</span>
      </div>
      <h2>Kelola Data Alat</h2>
    </header>

    <aside class="sidebar">
      <div class="title">
        <div class="logo">
          <img src="{{ asset('img/logo.png') }}" alt="logo">
        </div>
        <span class="material-symbols-outlined" onclick="closeSidebar()">close</span>
      </div>

      <ul class="list">
  <li class="item">
    <a href="{{ url('dashboard-admin') }}">
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
    <a href="{{ url('peminjaman-admin') }}">
      <span class="material-symbols-outlined">folder_open</span>
      Peminjaman
    </a>
  </li>

  <li class="item">
    <a href="{{ url('pengembalian-admin') }}">
      <span class="material-symbols-outlined">manage_history</span>
      Pengembalian
    </a>
  </li>

  <li class="item">
    <a href="{{ url('laporan-admin') }}">
      <span class="material-symbols-outlined">report</span>
      Laporan
    </a>
  </li>

  <li class="logout-btn">
    <form action="{{ url('logout') }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="btn btn-logout" style="background: none; border: none; padding: 0;">
        <a style="cursor: pointer;">Logout</a>
      </button>
    </form>
  </li>
</ul>
    </aside>

    <main class="main">
      @if(session('success'))
        <div class="alert-success">
          {{ session('success') }}
        </div>
      @endif

      <div class="cards">
        <div class="card">
          <div class="inner">
            <h3>Alat Tersedia</h3>
            <span class="material-symbols-outlined">check_circle</span>
          </div>
          <h4>45</h4> </div>

        <div class="card">
          <div class="inner">
            <h3>Alat Dipinjam</h3>
            <span class="material-symbols-outlined">cancel</span>
          </div>
          <h4>75</h4>
        </div>
      </div>

      <div class="filter-box">
        <select>
          <option>Semua Kategori</option>
          <option value="elektronik">Elektronik</option>
          <option value="olahraga">Olahraga</option>
          <option value="kebersihan">Kebersihan</option>
        </select>

        <div class="search-box">
          <input type="text" placeholder="Cari nama alat">
          <span class="material-symbols-outlined">search</span>
        </div>

        <button class="btn-add">
          <a href="{{ route('alat.create') }}">
            <span class="material-symbols-outlined">add</span>
            Tambah Alat
          </a>
        </button>
      </div>

      <div class="table-dataAlat">
        <table class="dataAlat-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama alat</th>
              <th>Kategori</th>
              <th>Jumlah</th>
              <th>Tersedia</th>
              <th>Status</th>
              <th>Dipinjam</th>
              <th style="text-align: center;">Aksi</th>
            </tr>
          </thead>

          <tbody>
            @foreach($alat as $no => $item)
            <tr>
              <td>{{ $no + 1 }}</td>
              <td>{{ $item->nama_alat }}</td>
              <td>
                <span class="badge tersedia">{{ $item->kategori->nama_kategori }}</span>
              </td>
              <td>{{ $item->jumlah_alat }}</td>
              
              <td>{{ $item->jumlah_tersedia ?? $item->jumlah_alat }}</td> 
              <td>
                @if(($item->jumlah_tersedia ?? $item->jumlah_alat) > 0)
                  <span class="badge tersedia">Tersedia</span>
                @else
                  <span class="badge tidak">Tidak Tersedia</span>
                @endif
              </td>
              <td>{{ $item->jumlah_dipinjam ?? 0 }}</td>
              
              <td class="aksi" style="text-align: center;">
                <a href="{{ route('alat.edit', $item->id) }}" class="edit" style="text-decoration: none; display: inline-block; margin-right: 5px;">
                  <span class="material-symbols-outlined" style="color: #ffc107;">edit</span>
                </a>

                <form action="{{ route('alat.destroy', $item->id) }}" method="POST" class="d-inline" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="hapus" style="background: none; border: none; padding: 0; cursor: pointer;">
                    <span class="material-symbols-outlined" style="color: #dc3545;">delete</span>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="pagination-laravel" style="margin-top: 20px;">
          {{ $alat->links() }}
        </div>
      </div>

    </main>
  </div>
</body>
</html>