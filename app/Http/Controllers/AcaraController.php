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
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'klien_id' => 'required|exists:kliens,id',
            'kategori_acara_id' => 'required|exists:kategori_acaras,id',
            'vendors' => 'nullable|array',
            'vendors.*' => 'exists:vendors,id',
            'deskripsi' => 'nullable|string',
            'jumlah_tamu' => 'nullable|integer|min:0',
            'catatan_laporan' => 'nullable|string',
            'rating' => 'nullable|numeric|min:1|max:5',
            'feedback' => 'nullable|string',
        ]);

        // Hitung total_biaya dari vendor
        $total_biaya = 0;
        if ($request->vendors) {
            $vendor_biayas = Vendor::whereIn('id', $request->vendors)->pluck('biaya');
            $total_biaya = $vendor_biayas->sum();
        }

        $acara = Acara::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'klien_id' => $request->klien_id,
            'kategori_acara_id' => $request->kategori_acara_id,
            'deskripsi' => $request->deskripsi,
            'jumlah_tamu' => $request->jumlah_tamu,
            'total_biaya' => $total_biaya,
            'catatan_laporan' => $request->catatan_laporan,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        // Simpan relasi vendor
        if ($request->vendors) {
            $acara->vendors()->attach($request->vendors);
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
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'klien_id' => 'required|exists:kliens,id',
            'kategori_acara_id' => 'required|exists:kategori_acaras,id',
            'vendors' => 'nullable|array',
            'vendors.*' => 'exists:vendors,id',
            'deskripsi' => 'nullable|string',
            'jumlah_tamu' => 'nullable|integer|min:0',
            'catatan_laporan' => 'nullable|string',
            'rating' => 'nullable|numeric|min:1|max:5',
            'feedback' => 'nullable|string',
        ]);

        // Hitung ulang total biaya
        $total_biaya = 0;
        if ($request->vendors) {
            $vendor_biayas = Vendor::whereIn('id', $request->vendors)->pluck('biaya');
            $total_biaya = $vendor_biayas->sum();
        }

        $acara->update([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'klien_id' => $request->klien_id,
            'kategori_acara_id' => $request->kategori_acara_id,
            'deskripsi' => $request->deskripsi,
            'jumlah_tamu' => $request->jumlah_tamu,
            'total_biaya' => $total_biaya,
            'catatan_laporan' => $request->catatan_laporan,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        // Sync vendor (replace existing relasi)
        $acara->vendors()->sync($request->vendors ?? []);

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
