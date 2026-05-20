<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    // ─────────────────────────────────────────────────────────────────────────
    // Cek apakah user yang login adalah admin.
    // Dipanggil di setiap method karena tidak pakai middleware.
    // ─────────────────────────────────────────────────────────────────────────
    private function checkAdmin()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Hanya admin yang bisa mengakses halaman ini.');
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // INDEX — Tampilkan daftar siswa dengan search & pagination
    // ─────────────────────────────────────────────────────────────────────────
    public function index(Request $request)
    {
        $this->checkAdmin();

        $search = $request->get('search');

        $siswas = User::where('role', 'siswa')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama_user', 'like', "%{$search}%")
                      ->orWhere('NIS', 'like', "%{$search}%")
                      ->orWhere('kelas', 'like', "%{$search}%");
                });
            })
            ->orderBy('nama_user', 'asc')
            ->paginate(10)
            ->withQueryString(); // Pertahankan ?search= saat ganti halaman

        return view('admin.siswa.index', compact('siswas', 'search'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CREATE — Tampilkan form tambah siswa
    // ─────────────────────────────────────────────────────────────────────────
    public function create()
    {
        $this->checkAdmin();

        return view('admin.siswa.create');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // STORE — Validasi lalu simpan siswa baru
    // ─────────────────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $this->checkAdmin();

        // Validasi input langsung di controller
        $request->validate([
            'nama_user'  => 'required|string|max:255',
            'NIS'        => 'required|string|max:20|unique:user,NIS',
            'kelas'      => 'required|string|max:50',
            'no_telepon' => 'required|string|max:15',
            'email'      => 'required|email|unique:user,email',
            'password'   => 'required|string|min:6|confirmed',
        ], [
            'nama_user.required'  => 'Nama siswa wajib diisi.',
            'nama_user.max'       => 'Nama maksimal 255 karakter.',
            'NIS.required'        => 'NIS wajib diisi.',
            'NIS.unique'          => 'NIS sudah terdaftar.',
            'NIS.max'             => 'NIS maksimal 20 karakter.',
            'kelas.required'      => 'Kelas wajib diisi.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'email.required'      => 'Email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email sudah terdaftar.',
            'password.required'   => 'Password wajib diisi.',
            'password.min'        => 'Password minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        User::create([
            'nama_user'  => $request->nama_user,
            'NIS'        => $request->NIS,
            'kelas'      => $request->kelas,
            'no_telepon' => $request->no_telepon,
            'email'      => $request->email,
            'password'   => Hash::make($request->password), // Enkripsi password
            'role'       => 'siswa',                        // Role otomatis siswa
        ]);

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // EDIT — Tampilkan form edit siswa
    // ─────────────────────────────────────────────────────────────────────────
    public function edit(string $id)
    {
        $this->checkAdmin();

        // findOrFail otomatis 404 jika tidak ditemukan
        // Tambahan where role siswa agar admin tidak bisa edit akun admin lain
        $siswa = User::where('role', 'siswa')->findOrFail($id);

        return view('admin.siswa.edit', compact('siswa'));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // UPDATE — Validasi lalu update data siswa
    // ─────────────────────────────────────────────────────────────────────────
    public function update(Request $request, string $id)
    {
        $this->checkAdmin();

        $siswa = User::where('role', 'siswa')->findOrFail($id);

        $request->validate([
            'nama_user'  => 'required|string|max:255',
            // ignore($id) → NIS/email milik siswa ini sendiri tidak dianggap duplikat
            'NIS'        => ['required', 'string', 'max:20', Rule::unique('user', 'NIS')->ignore($id)],
            'kelas'      => 'required|string|max:50',
            'no_telepon' => 'required|string|max:15',
            'email'      => ['required', 'email', Rule::unique('user', 'email')->ignore($id)],
            // Password nullable saat edit — hanya diupdate jika diisi
            'password'   => 'nullable|string|min:6|confirmed',
        ], [
            'nama_user.required'  => 'Nama siswa wajib diisi.',
            'NIS.required'        => 'NIS wajib diisi.',
            'NIS.unique'          => 'NIS sudah terdaftar.',
            'kelas.required'      => 'Kelas wajib diisi.',
            'no_telepon.required' => 'Nomor telepon wajib diisi.',
            'email.required'      => 'Email wajib diisi.',
            'email.email'         => 'Format email tidak valid.',
            'email.unique'        => 'Email sudah terdaftar.',
            'password.min'        => 'Password minimal 6 karakter.',
            'password.confirmed'  => 'Konfirmasi password tidak cocok.',
        ]);

        $siswa->nama_user  = $request->nama_user;
        $siswa->NIS        = $request->NIS;
        $siswa->kelas      = $request->kelas;
        $siswa->no_telepon = $request->no_telepon;
        $siswa->email      = $request->email;

        // Hanya update password jika user mengisi field password
        if ($request->filled('password')) {
            $siswa->password = Hash::make($request->password);
        }

        $siswa->save();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    // ─────────────────────────────────────────────────────────────────────────
    // DESTROY — Hapus data siswa
    // ─────────────────────────────────────────────────────────────────────────
    public function destroy(string $id)
    {
        $this->checkAdmin();

        $siswa = User::where('role', 'siswa')->findOrFail($id);

        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}