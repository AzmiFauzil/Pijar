<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data Siswa-2</title>
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
                    <img src="img/logo.png" alt="logo">
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
            <div class="filter-box">

                <div class="search-box">
                    <input type="text" placeholder="Cari Nama atau NIS">
                    <span class="material-symbols-outlined">search</span>
                </div>

                <button class="btn-add">
                    <a href="siswa-tambah.blade.php">
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
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Status</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>11</td>
                            <td>2023001</td>
                            <td>Nesya</td>
                            <td>XI PPLG</td>
                            <td>Perempuan</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>12</td>
                            <td>2023001</td>
                            <td>Aul</td>
                            <td>XI DKV</td>
                            <td>Perempuan</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 nonaktif">Nonaktif</span></td>
                        </tr>

                        <tr>
                            <td>13</td>
                            <td>2023001</td>
                            <td>Rahmat</td>
                            <td>XII PPLG</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>14</td>
                            <td>2023001</td>
                            <td>Keonho</td>
                            <td>X PPLG</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>15</td>
                            <td>2023001</td>
                            <td>Han Sohee</td>
                            <td>XII DKV</td>
                            <td>Perempuan</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 nonaktif">Nonaktif</span></td>
                        </tr>

                        <tr>
                            <td>16</td>
                            <td>2023001</td>
                            <td>Mulyono</td>
                            <td>XI PPLG</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>17</td>
                            <td>2023001</td>
                            <td>CEO MBG</td>
                            <td>XII DKV</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 nonaktif">Nonaktif</span></td>
                        </tr>

                        <tr>
                            <td>18</td>
                            <td>2023001</td>
                            <td>Fufufafa</td>
                            <td>X DKV</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>19</td>
                            <td>2020207</td>
                            <td>Windut</td>
                            <td>XII DKV</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>

                        <tr>
                            <td>20</td>
                            <td>2020207</td>
                            <td>Kurniawan</td>
                            <td>X DKV</td>
                            <td>Laki-laki</td>
                            <td>0812345678</td>
                            <td>email@gmail.com</td>
                            <td><span class="badge2 aktif">Aktif</span></td>
                        </tr>


                    </tbody>
                </table>

                <div class="pagination">
                    <a href="dataSiswa-admin.blade.php">
                        << /a>
                            <a href="dataSiswa-admin.blade.php">1</a>
                            <a href="dataSiswa-admin-table-2.blade.php" class="pagination-active">2</a>
                            <a href="dataSiswa-admin-table-2.blade.php">></a>
                </div>

            </div>


        </main>

</body>

</html>