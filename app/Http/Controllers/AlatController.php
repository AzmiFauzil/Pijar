<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Kategori;


class AlatController extends Controller
{
    /**
     * Menampilkan semua data alat
     */
    public function index()
    {
        $alat = Alat::with('kategori')->latest()->paginate(5);
        return view('admin.data-alat-admin', compact('alat'));
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
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah_alat' => 'required|integer',
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
            'kategori_id' => 'required|exists:kategori,id',
            'jumlah_alat' => 'required|integer',
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
        $alat->delete();

        return redirect()->route('alat.index')
                        ->with('success', 'Alat berhasil dihapus');
    }
}