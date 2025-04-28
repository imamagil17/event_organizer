<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;

class KlienController extends Controller
{
    public function index()
    {
        $kliens = Klien::all();
        return view('kliens.index', compact('kliens'));
    }

    public function create()
    {
        return view('kliens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:kliens,email',
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        Klien::create($request->all());

        return redirect()->route('kliens.index')->with('success', 'Klien berhasil ditambahkan.');
    }

    public function show(Klien $klien)
    {
        return view('kliens.show', compact('klien'));
    }

    public function edit(Klien $klien)
    {
        return view('kliens.edit', compact('klien'));
    }

    public function update(Request $request, Klien $klien)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:kliens,email,' . $klien->id,
            'telepon' => 'nullable|string|max:20',
            'alamat' => 'nullable|string',
        ]);

        $klien->update($request->all());

        return redirect()->route('kliens.index')->with('success', 'Klien berhasil diperbarui.');
    }

    public function destroy(Klien $klien)
    {
        $klien->delete();

        return redirect()->route('kliens.index')->with('success', 'Klien berhasil dihapus.');
    }
}
