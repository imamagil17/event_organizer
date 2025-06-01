<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Klien;
use App\Models\KategoriAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcaraController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-acara')) {
            abort(401);
        }

        $acaras = Acara::with('klien', 'kategoriAcara')->get();
        return view('acaras.index', compact('acaras'));
    }

    public function create()
    {
        if (! Gate::allows('store-acara')) {
            abort(401);
        }

        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        return view('acaras.create', compact('kliens', 'kategoriAcaras'));
    }

    public function store(Request $request)
    {
        if (! Gate::allows('store-acara')) {
            abort(401);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'klien_id' => 'required|exists:kliens,id',
            'kategori_acara_id' => 'required|exists:kategori_acaras,id',
        ]);

        Acara::create($request->all());

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function show(Acara $acara)
    {   
        if (! Gate::allows('view-acara')) {
            abort(401);
        }

        return view('acaras.show', compact('acara'));
    }

    public function edit(Acara $acara)
    {
        if (! Gate::allows('edit-acara')) {
            abort(401);
        }

        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        return view('acaras.edit', compact('acara', 'kliens', 'kategoriAcaras'));
    }

    public function update(Request $request, Acara $acara)
    {
        if (! Gate::allows('edit-acara')) {
            abort(401);
        }

        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'klien_id' => 'required|exists:kliens,id',
            'kategori_acara_id' => 'required|exists:kategori_acaras,id',
        ]);

        $acara->update($request->all());

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil diperbarui.');
    }

    public function destroy(Acara $acara)
    {
        if (! Gate::allows('destroy-acara')) {
            abort(401);
        }

        $acara->delete();

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil dihapus.');
    }
}
