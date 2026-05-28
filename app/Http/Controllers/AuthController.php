<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function proses_register(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'NIS' => 'required|unique:user',
            'kelas' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required',
        ]);

        User::create([
            'nama_user' => $request->nama_user,
            'NIS' => $request->NIS,
            'kelas' => $request->kelas,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'user'
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil.');
    }

    public function login()
    {
        return view('login');
    }

    public function proses_login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {

            if (auth()->user()->role == 'admin') {
                return redirect('/dashboard-admin');
            }

            if (auth()->user()->role == 'petugas') {
                return redirect('/dashboard-petugas');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ]);
    }

    public function dashboard()
    {
        return view('siswa.dashboard');
    }

    public function dashboard_admin()
    {
        $total_alat = Alat::sum('jumlah_alat');
        
        // Menghitung total alat yang sedang dipinjam (belum dikembalikan)
        $total_dipinjam = DB::table('peminjaman')
            ->leftJoin('pengembalian', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
            ->whereNull('pengembalian.id')
            ->sum('peminjaman.jumlah') ?? 0;
            
        $total_tersedia = $total_alat - $total_dipinjam;
        // Menghitung user dengan role 'user' (siswa) sesuai method proses_register
        $total_user = User::where('role', 'user')->count();

        // Mengambil data peminjaman terbaru untuk tabel
        $recent_peminjaman = DB::table('peminjaman')
            ->join('user', 'peminjaman.user_id', '=', 'user.id')
            ->join('alat', 'peminjaman.alat_id', '=', 'alat.id')
            ->leftJoin('pengembalian', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
            ->select('peminjaman.*', 'user.nama_user', 'alat.nama_alat', 'pengembalian.id as return_id')
            ->latest('peminjaman.created_at')
            ->limit(5)
            ->get();
            
        // Mengambil data peringatan (terlambat > 3 hari)
        $late_peminjaman = DB::table('peminjaman')
            ->join('user', 'peminjaman.user_id', '=', 'user.id')
            ->join('alat', 'peminjaman.alat_id', '=', 'alat.id')
            ->leftJoin('pengembalian', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
            ->whereNull('pengembalian.id')
            ->where('peminjaman.tanggal_peminjaman', '<', now()->subDays(3))
            ->select('peminjaman.*', 'user.nama_user', 'alat.nama_alat')
            ->limit(3)
            ->get();

        return view('admin.dashboard-admin', compact(
            'total_alat', 'total_dipinjam', 'total_tersedia', 'total_user', 'recent_peminjaman', 'late_peminjaman'
        ));
    }

    public function dashboard_petugas()
    {
        return view('petugas.dashboard-petugas');
    }


    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}