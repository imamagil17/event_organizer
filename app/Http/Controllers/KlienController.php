<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KlienController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-klien')) {
            abort(401);
        }

        $kliens = Klien::all();
        return view('kliens.index', compact('kliens'));
    }

    public function create()
    {
        if (! Gate::allows('store-klien')) {
            abort(401);
        }

        return view('kliens.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('store-klien')) {
            abort(401);
        }

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
        if (! Gate::allows('view-klien')) {
            abort(401);
        }

        return view('kliens.show', compact('klien'));
    }

    public function edit(Klien $klien)
    {
        if (! Gate::allows('edit-klien')) {
            abort(401);
        }

        return view('kliens.edit', compact('klien'));
    }

    public function update(Request $request, Klien $klien)
    {
        if (! Gate::allows('edit-klien')) {
            abort(401);
        }

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
        if (! Gate::allows('destroy-klien')) {
            abort(401);
        }

        $klien->delete();

        return redirect()->route('kliens.index')->with('success', 'Klien berhasil dihapus.');
    }
}
