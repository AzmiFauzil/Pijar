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
    .badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 600;
        display: inline-block;
    }
    .badge.tersedia {
        background-color: #dcfce7;
        color: #16a34a;
    }
    .badge.tidak {
        background-color: #fee2e2;
        color: #dc2626;
    }
    .filter-form {
        display: flex;
        align-items: center;
        gap: 15px;
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
      @if(session('success'))
        <div class="alert-success">
          {{ session('success') }}
        </div>
      @endif

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
            <h3>Alat Tersedia</h3>
            <span class="material-symbols-outlined">check_circle</span>
          </div>
          <h4>{{ $total_tersedia }}</h4> 
        </div>

        <div class="card">
          <div class="inner">
            <h3>Alat Dipinjam</h3>
            <span class="material-symbols-outlined">cancel</span>
          </div>
          <h4>{{ $total_dipinjam }}</h4>
        </div>
      </div>

      <div class="filter-box">
        <form action="{{ route('alat.index') }}" method="GET" class="filter-form">
            <select name="kategori_id" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                @foreach($kategori_list as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori_filter == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <div class="search-box">
                <input type="text" name="search" placeholder="Cari nama alat" value="{{ $search }}">
                <span class="material-symbols-outlined" onclick="this.closest('form').submit()">search</span>
            </div>

            <button type="button" class="btn-add" onclick="window.location.href='{{ route('alat.create') }}'">
                <span class="material-symbols-outlined">add</span>
                Tambah Alat
            </button>
        </form>
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
            @forelse($alat as $no => $item)
            <tr>
              <td>{{ ($alat->currentPage() - 1) * $alat->perPage() + $loop->iteration }}</td>
              <td>{{ $item->nama_alat }}</td>
              <td>
                <span class="badge tersedia">{{ $item->kategori->nama_kategori }}</span>
              </td>
              <td>{{ $item->jumlah_alat }}</td>
              <td>{{ $item->jumlah_tersedia }}</td> 
              <td>
                @if($item->jumlah_tersedia > 0)
                  <span class="badge tersedia">Tersedia</span>
                @else
                  <span class="badge tidak">Tidak Tersedia</span>
                @endif
              </td>
              <td>{{ $item->jumlah_dipinjam }}</td>
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
            @empty
                <tr>
                    <td colspan="8" style="text-align: center;">Tidak ada data alat ditemukan.</td>
                </tr>
            @endforelse
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