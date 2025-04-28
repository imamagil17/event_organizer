<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Klien;
use App\Models\KategoriAcara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::with('klien', 'kategoriAcara')->get();
        return view('acaras.index', compact('acaras'));
    }

    public function create()
    {
        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        return view('acaras.create', compact('kliens', 'kategoriAcaras'));
    }

    public function store(Request $request)
    {
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
        return view('acaras.show', compact('acara'));
    }

    public function edit(Acara $acara)
    {
        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        return view('acaras.edit', compact('acara', 'kliens', 'kategoriAcaras'));
    }

    public function update(Request $request, Acara $acara)
    {
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
        $acara->delete();

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil dihapus.');
    }
}
