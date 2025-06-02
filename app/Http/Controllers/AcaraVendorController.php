<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcaraVendorController extends Controller
{
    public function attach(Request $request)
    {
        if (!Gate::allows('edit-acara')) {
            abort(401);
        }

        $request->validate([
            'acara_id' => 'required|exists:acaras,id',
            'vendor_id' => 'required|exists:vendors,id',
            'peran' => 'nullable|string|max:255',
        ]);

        $acara = Acara::findOrFail($request->acara_id);
        $vendorId = $request->vendor_id;

        // Jangan duplikat
        if (!$acara->vendors->contains($vendorId)) {
            $acara->vendors()->attach($vendorId, [
                'peran' => $request->peran,
            ]);
        }

        return back()->with('success', 'Vendor berhasil ditambahkan ke acara.');
    }

    public function detach(Request $request)
    {
        if (!Gate::allows('edit-acara')) {
            abort(401);
        }

        $request->validate([
            'acara_id' => 'required|exists:acaras,id',
            'vendor_id' => 'required|exists:vendors,id',
        ]);

        $acara = Acara::findOrFail($request->acara_id);
        $acara->vendors()->detach($request->vendor_id);

        return back()->with('success', 'Vendor berhasil dihapus dari acara.');
    }
}
