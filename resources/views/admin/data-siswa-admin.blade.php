<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Siswa</title>
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
      <h2>Kelola Data Siswa</h2>
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
        <a href="{{ route('alat.index') }}"> <span class="material-symbols-outlined">folder_managed</span>
            Data alat
        </a>
    </li>
    <li class="item">
        <a href="{{ route('kategori.index') }}"> <span class="material-symbols-outlined">category</span>
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
       <div class="filter-box">

    <form action="{{ route('admin.siswa.index') }}" method="GET" class="search-box">
      <input type="text" name="search" value="{{ $search }}" placeholder="Cari Nama atau NIS">
      <span class="material-symbols-outlined" onclick="this.closest('form').submit()">search</span>
    </form>

    <button class="btn-add">
      <a href="{{ route('admin.siswa.create') }}">
        <span class="material-symbols-outlined">add</span>
      Tambah Siswa
      </a>
    </button>


  </div>

  <div class="table-siswa">
    <table class="siswa-table">
        <thead>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>No. HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </thead>

        <tbody>
            @forelse($siswas as $no => $item)
            <tr>
                <td>{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $loop->iteration }}</td>
                <td>{{ $item->NIS }}</td>
                <td>{{ $item->nama_user }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->no_telepon }}</td>
                <td>{{ $item->email }}</td>
                <td class="aksi">
            <a href="{{ route('admin.siswa.edit', $item->id) }}" class="edit">
              <span class="material-symbols-outlined" style="color: #ffc107;">edit</span>
            </a>

            <form action="{{ route('admin.siswa.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Hapus siswa ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="hapus" style="background:none; border:none; padding:0;">
                  <span class="material-symbols-outlined" style="color: #dc3545;">delete</span>
                </button>
            </form>
          </td>
            </tr>
            @empty
            <tr><td colspan="7" style="text-align:center;">Data tidak ditemukan.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:20px;">
        {{ $siswas->links() }}
    </div>

  </div>


     </main> 

    </body>
</html>