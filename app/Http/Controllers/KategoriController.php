<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori; // ← Pastikan model yang benar

class KategoriController extends Controller
{
    /**
     * Menampilkan semua data kategori
     */
    public function index()
    {
        $kategori = Kategori::withCount('alat')->latest()->paginate(5);
        return view('admin.category-admin', compact('kategori'));
    }

    /**
     * Form tambah kategori
     */
    public function create()
    {
        return view('admin.kategori-tambah');
    }

    /**
     * Simpan kategori baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index') // ← Sesuaikan dengan route名称
                        ->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Form edit kategori
     */
    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id); // ← Ambil data dulu
        return view('admin.kategori-edit', compact('kategori'));
    }

    /**
     * Update kategori
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = Kategori::findOrFail($id); // ← Ambil data dulu
        $kategori->update($request->all());

        return redirect()->route('kategori.index') // ← Sesuaikan dengan route名称
                        ->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Hapus kategori
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id); // ← Ambil data dulu
        $kategori->delete();

        return redirect()->route('kategori.index') // ← Sesuaikan dengan route名称
                        ->with('success', 'Kategori berhasil dihapus');
    }
}