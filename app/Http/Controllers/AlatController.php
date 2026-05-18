<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alat = Alat::with('kategori')->latest()->get();
        return view('alat.index', compact('alat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriAlat = Kategori::all();
        return view('alat.create', compact('kategoriAlat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_alat' => 'required',
            'jumlah_alat' => 'required'
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Alat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alat $alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alat $alat)
    {
        $kategoriAlat = Kategori::all();
        return view('alat.edit', compact('alat', 'kategoriAlat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'kategori_id' => 'required',
            'nama_alat' => 'required',
            'jumlah_alat' => 'required'
        ]);

        $alat->update($request->all());

        return redirect()->route('alat.index')
            ->with('success', 'Alat berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('alat.index')
            ->with('success', 'Alat berhasil dihapus.');
    }
}
