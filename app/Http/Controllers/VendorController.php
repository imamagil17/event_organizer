<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VendorController extends Controller
{
    public function index()
    {
        if (! Gate::allows('view-vendor')) {
            abort(401);
        }

        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        if (! Gate::allows('store-vendor')) {
            abort(401);
        }

        return view('vendors.create');
    }

    public function store(Request $request)
    {
        if (! Gate::allows('store-vendor')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_layanan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        Vendor::create($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor berhasil ditambahkan.');
    }

    public function show(Vendor $vendor)
    {
        if (! Gate::allows('view-vendor')) {
            abort(401);
        }

        return view('vendors.show', compact('vendor'));
    }

    public function edit(Vendor $vendor)
    {
        if (! Gate::allows('edit-vendor')) {
            abort(401);
        }

        return view('vendors.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        if (! Gate::allows('edit-vendor')) {
            abort(401);
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_layanan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'biaya' => 'required|numeric|min:0',
        ]);

        $vendor->update($request->all());

        return redirect()->route('vendors.index')->with('success', 'Vendor berhasil diperbarui.');
    }

    public function destroy(Vendor $vendor)
    {
        if (! Gate::allows('destroy-vendor')) {
            abort(401);
        }

        $vendor->delete();

        return redirect()->route('vendors.index')->with('success', 'Vendor berhasil dihapus.');
    }
}
