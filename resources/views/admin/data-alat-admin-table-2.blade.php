<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Data Alat-2</title>
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
      <h2>Kelola Data Alat</h2>
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
          <a href="dashboard-admin.blade.php">
            <span class="material-symbols-outlined">home</span>
          Dashboard Admin
          </a>
        </li>
        <li class="item">
          <a href="data-siswa-admin.blade.php"><span class="material-symbols-outlined">manage_accounts</span>
          Data siswa</a>
        </li>
        <li class="item">
          <a href="data-alat-admin.blade.php"><span class="material-symbols-outlined">folder_managed</span>
          Data alat</a>
        </li>
        <li class="item">
          <a href="category-admin.blade.php"><span class="material-symbols-outlined">category</span>
          Kategori</a>
        </li>
        <li class="item">
          <a href="peminjaman-admin.blade.php"><span class="material-symbols-outlined">folder_open</span>
          Peminjaman</a>
        </li>
        <li class="item">
          <a href="pengembalian-admin.blade.php"><span class="material-symbols-outlined">manage_history</span>
          Pengembalian</a>
        </li>
        <li class="item">
          <a href="laporan-admin.blade.php"><span class="material-symbols-outlined">report</span>
          Laporan</a>
        </li>
        <li class="logout-btn">
                    <button class="btn btn-logout">
                        <a href="">Logout</a>
                    </button>
                </li>
      </ul>
    </aside>

    <main class="main">
      <div class="cards">
        <div class="card">
          <div class="inner">
            <h3>Alat Tersedia</h3>
            <span class="material-symbols-outlined">check_circle</span>
          </div>
          <h4>45</h4>
        </div>

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
      <a href="alat-tambah.blade.php">
        <span class="material-symbols-outlined">add</span>
      Tambah Alat
      </a>
    </button>

  </div>

  <!-- TABLE -->
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
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>

        <tr>
          <td>11</td>
          <td>Laptop</td>
          <td>Elektronik</td>
          <td>10</td>
          <td>6</td>
          <td><span class="badge tersedia">Tersedia</span></td>
          <td>0</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>12</td>
          <td>Kamera</td>
          <td>Elektronik</td>
          <td>6</td>
          <td>4</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>2</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>13</td>
          <td>Infokus</td>
          <td>Elektronik</td>
          <td>6</td>
          <td>0</td>
          <td><span class="badge tidak">Tidak Tersedia</span></td>
          <td>0</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>14</td>
          <td>Terminal</td>
          <td>Elektronik</td>
          <td>10</td>
          <td>6</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>4</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>15</td>
          <td>Pel</td>
          <td>Kebersihan</td>
          <td>10</td>
          <td>6</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>4</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>16</td>
          <td>Bola</td>
          <td>Olahraga</td>
          <td>6</td>
          <td>0</td>
          <td><span class="badge tidak">Tidak Tersedia</span></td>
          <td>0</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>17</td>
          <td>Bola Basket</td>
          <td>Olahraga</td>
          <td>6</td>
          <td>4</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>2</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>        

        <tr>
          <td>18</td>
          <td>Keyboard</td>
          <td>Elektronik</td>
          <td>6</td>
          <td>4</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>2</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <td>19</td>
          <td>Keyboard</td>
          <td>Elektronik</td>
          <td>6</td>
          <td>4</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>2</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

        <tr>
          <td>20</td>
          <td>Pel</td>
          <td>Kebersihan</td>
          <td>10</td>
          <td>6</td>
          <td><span class="badge dipinjam">Dipinjam</span></td>
          <td>4</td>
          <td class="aksi">
            <button class="edit">
              <span class="material-symbols-outlined">edit</span>
            </button>

            <button class="hapus">
              <span class="material-symbols-outlined">delete</span>
            </button>
          </td>
        </tr>

      </tbody>

    </table>


    <div class="pagination">
      <a href="dataAlat.html"><</a>
      <a href="dataAlat.html">1</a>
      <a href="dataAlat-table-2.html"  class="pagination-active">2</a>
      <a href="dataAlat-table-2.html">></a>
    </div>



     </main> 

    </body>
</html> 