<?php

namespace App\Http\Controllers;

use App\Models\JadwalAcara;
use App\Models\Acara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JadwalAcaraController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-jadwal_acara')) {
            abort(401);
        }

        $jadwalAcaras = JadwalAcara::with('acara')->get();

        return view('jadwal_acaras.index', compact('jadwalAcaras'));
    }

    public function create()
    {
        if (! Gate::allows('store-jadwal_acara')) {
            abort(401);
        }

        $acaras = Acara::all();
        return view('jadwal_acaras.create', compact('acaras'));
    }

    public function store(Request $request)
    {
        if (! Gate::allows('store-jadwal_acara')) {
            abort(401);
        }

        $request->validate([
            'acara_id' => 'required|exists:acaras,id',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        JadwalAcara::create($request->all());

        return redirect()->route('jadwal_acaras.index')
            ->with('success', 'Jadwal acara berhasil ditambahkan.');
    }

    public function show(JadwalAcara $jadwalAcara)
    {
        if (! Gate::allows('view-jadwal_acara')) {
            abort(401);
        }

        $jadwalAcara->load('acara');
        return view('jadwal_acaras.show', compact('jadwalAcara'));
    }

    public function edit(JadwalAcara $jadwalAcara)
    {
        if (! Gate::allows('edit-jadwal_acara')) {
            abort(401);
        }

        $acaras = Acara::all();
        return view('jadwal_acaras.edit', compact('jadwalAcara', 'acaras'));
    }

    public function update(Request $request, JadwalAcara $jadwalAcara)
    {
        if (! Gate::allows('edit-jadwal_acara')) {
            abort(401);
        }

        $request->validate([
            'acara_id' => 'required|exists:acaras,id',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'judul_kegiatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jadwalAcara->update($request->all());

        return redirect()->route('jadwal_acaras.index')
            ->with('success', 'Jadwal acara berhasil diperbarui.');
    }

    public function destroy(JadwalAcara $jadwalAcara)
    {
        if (! Gate::allows('destroy-jadwal_acara')) {
            abort(401);
        }

        $jadwalAcara->delete();

        return redirect()->route('jadwal_acaras.index')
            ->with('success', 'Jadwal acara berhasil dihapus.');
    }
}
