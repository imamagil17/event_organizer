<?php

namespace App\Http\Controllers;

use App\Models\KategoriAcara;
use Illuminate\Http\Request;

class KategoriAcaraController extends Controller
{
    public function index()
    {
        $kategoriAcaras = KategoriAcara::all();
        return view('kategori_acaras.index', compact('kategoriAcaras'));
    }

    public function create()
    {
        return view('kategori_acaras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriAcara::create($request->all());

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil ditambahkan.');
    }

    public function show(KategoriAcara $kategoriAcara)
    {
        return view('kategori_acaras.show', compact('kategoriAcara'));
    }

    public function edit(KategoriAcara $kategoriAcara)
    {
        return view('kategori_acaras.edit', compact('kategoriAcara'));
    }

    public function update(Request $request, KategoriAcara $kategoriAcara)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriAcara->update($request->all());

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil diperbarui.');
    }

    public function destroy(KategoriAcara $kategoriAcara)
    {
        $kategoriAcara->delete();

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil dihapus.');
    }
}
