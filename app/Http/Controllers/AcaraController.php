<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Klien;
use App\Models\KategoriAcara;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcaraController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-acara')) {
            abort(401);
        }

        $acaras = Acara::with('klien', 'kategoriAcara', 'vendors')->get();
        return view('acaras.index', compact('acaras'));
    }

    public function create()
    {
        if (! Gate::allows('store-acara')) {
            abort(401);
        }

        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        $vendors = Vendor::all();  // Tambahkan untuk pilihan vendor
        return view('acaras.create', compact('kliens', 'kategoriAcaras', 'vendors'));
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
            'jumlah_tamu' => 'nullable|integer|min:0',
            'total_biaya' => 'nullable|numeric|min:0',
            'catatan_laporan' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'feedback' => 'nullable|string',
            'vendor_id' => 'nullable|array',
            'vendor_id.*' => 'exists:vendors,id',
        ]);

        // Buat acara tanpa relasi vendor dulu
        $acara = Acara::create($request->except('vendor_id'));

        // Sync vendor many-to-many
        if ($request->has('vendor_id')) {
            $acara->vendors()->sync($request->vendor_id);
        }

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil ditambahkan.');
    }

    public function show(Acara $acara)
    {
        if (! Gate::allows('view-acara')) {
            abort(401);
        }

        $acara->load('klien', 'kategoriAcara', 'vendors', 'jadwalAcaras');

        return view('acaras.show', compact('acara'));
    }

    public function edit(Acara $acara)
    {
        if (! Gate::allows('edit-acara')) {
            abort(401);
        }

        $kliens = Klien::all();
        $kategoriAcaras = KategoriAcara::all();
        $vendors = Vendor::all();

        $acara->load('vendors');

        return view('acaras.edit', compact('acara', 'kliens', 'kategoriAcaras', 'vendors'));
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
            'jumlah_tamu' => 'nullable|integer|min:0',
            'total_biaya' => 'nullable|numeric|min:0',
            'catatan_laporan' => 'nullable|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'feedback' => 'nullable|string',
            'vendor_id' => 'nullable|array',
            'vendor_id.*' => 'exists:vendors,id',
        ]);

        $acara->update($request->except('vendor_id'));

        // Sync vendor many-to-many
        if ($request->has('vendor_id')) {
            $acara->vendors()->sync($request->vendor_id);
        } else {
            $acara->vendors()->detach();
        }

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil diperbarui.');
    }

    public function destroy(Acara $acara)
    {
        if (! Gate::allows('destroy-acara')) {
            abort(401);
        }

        $acara->vendors()->detach(); // detach dulu relasi vendor
        $acara->delete();

        return redirect()->route('acaras.index')->with('success', 'Acara berhasil dihapus.');
    }
}
