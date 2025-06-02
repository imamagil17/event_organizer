<?php

namespace App\Http\Controllers;

use App\Models\KategoriAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KategoriAcaraController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-kategori_acara')) {
            abort(401);
        }

        $kategoriAcaras = KategoriAcara::all();
        return view('kategori_acaras.index', compact('kategoriAcaras'));
    }

    public function create()
    {
        if (! Gate::allows('store-kategori_acara')) {
            abort(401);
        }

        return view('kategori_acaras.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('store-kategori_acara')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        KategoriAcara::create($request->all());

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil ditambahkan.');
    }

    public function show(KategoriAcara $kategoriAcara)
    {
        if (! Gate::allows('view-kategori_acara')) {
            abort(401);
        }

        return view('kategori_acaras.show', compact('kategoriAcara'));
    }

    public function edit(KategoriAcara $kategoriAcara)
    {
        if (! Gate::allows('edit-kategori_acara')) {
            abort(401);
        }

        return view('kategori_acaras.edit', compact('kategoriAcara'));
    }

    public function update(Request $request, KategoriAcara $kategoriAcara)
    {
        if (! Gate::allows('edit-kategori_acara')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $kategoriAcara->update($request->all());

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil diperbarui.');
    }

    public function destroy(KategoriAcara $kategoriAcara)
    {
        if (! Gate::allows('destroy-kategori_acara')) {
            abort(401);
        }

        $kategoriAcara->delete();

        return redirect()->route('kategori_acaras.index')->with('success', 'Kategori acara berhasil dihapus.');
    }
}
