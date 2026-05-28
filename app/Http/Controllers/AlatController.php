<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;


class AlatController extends Controller
{
    /**
     * Menampilkan semua data alat
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $kategori_filter = $request->get('kategori_id');

        $query = Alat::with('kategori');

        if ($search) {
            $query->where('nama_alat', 'like', '%' . $search . '%');
        }

        if ($kategori_filter) {
            $query->where('kategori_id', $kategori_filter);
        }

        $alat = $query->latest()->paginate(5);
        
        // Menghitung data peminjaman riil untuk setiap alat dalam koleksi
        $alat->getCollection()->transform(function ($item) {
            $item->jumlah_dipinjam = DB::table('peminjaman')
                ->leftJoin('pengembalian', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
                ->where('peminjaman.alat_id', $item->id)
                ->whereNull('pengembalian.id')
                ->sum('peminjaman.jumlah') ?? 0;
            $item->jumlah_tersedia = $item->jumlah_alat - $item->jumlah_dipinjam;
            return $item;
        });

        $kategori_list = Kategori::all(); // Fetch all categories for the filter dropdown

        // Calculate totals for the cards
        $total_alat = Alat::sum('jumlah_alat');
        $total_dipinjam = DB::table('peminjaman')
            ->leftJoin('pengembalian', 'peminjaman.id', '=', 'pengembalian.peminjaman_id')
            ->whereNull('pengembalian.id')
            ->sum('peminjaman.jumlah') ?? 0;
        $total_tersedia = $total_alat - $total_dipinjam;

        return view('admin.data-alat-admin', compact(
            'alat', 'kategori_list', 'search', 'kategori_filter', 'total_alat', 'total_tersedia', 'total_dipinjam'
        ));
    }

    /**
     * Form tambah alat
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.alat-tambah', compact('kategori'));
    }

    /**
     * Simpan alat baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kategori_id' => 'required|exists:kategori,id', // Ensure kategori_id exists in the 'kategori' table
            'jumlah_alat' => 'required|integer|min:0', // Ensure jumlah_alat is an integer and non-negative
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')
                        ->with('success', 'Alat berhasil ditambahkan');
    }

    /**
     * Form edit alat
     */
    public function edit(string $id)
    {
        $alat = Alat::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.alat-edit', compact('alat', 'kategori'));
    }

    /**
     * Update alat
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kategori_id' => 'required|exists:kategori,id', // Ensure kategori_id exists in the 'kategori' table
            'jumlah_alat' => 'required|integer|min:0', // Ensure jumlah_alat is an integer and non-negative
        ]);

        $alat = Alat::findOrFail($id);
        $alat->update($request->all());

        return redirect()->route('alat.index')
                        ->with('success', 'Alat berhasil diupdate');
    }

    /**
     * Hapus alat
     */
    public function destroy(string $id)
    {
        $alat = Alat::findOrFail($id);
        // Consider adding a check here if the tool is currently borrowed
        // For example: if ($alat->jumlah_dipinjam > 0) { return back()->withErrors('Tidak bisa menghapus alat yang sedang dipinjam.'); }
        $alat->delete(); // Delete the tool

        return redirect()->route('alat.index')
                        ->with('success', 'Alat berhasil dihapus');
    }
}