<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Acara;
use App\Models\Klien;
use App\Models\Vendor;
use App\Models\KategoriAcara;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKlien = Klien::count();
        $jumlahAcara = Acara::count();
        $jumlahKategori = KategoriAcara::count();
        $jumlahVendor = Vendor::count();

        $rataRating = Acara::whereNotNull('rating')->avg('rating');

        $klienTerbaru = Klien::latest()->take(5)->get();
        $vendorTerbaru = Vendor::latest()->take(5)->get();

        $acaras = Acara::with('klien')
            ->where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->limit(5)
            ->get()
            ->map(function ($acara) {
                $today = Carbon::today();
                $tanggalAcara = Carbon::parse($acara->tanggal);

                $selisih = $today->diffInDays($tanggalAcara, false);

                if ($selisih === 0) {
                    $acara->status_waktu = 'Hari Ini';
                } elseif ($selisih === 1) {
                    $acara->status_waktu = 'Besok';
                } else {
                    $acara->status_waktu = "Dalam {$selisih} Hari";
                }

                return $acara;
            });

        // Distribusi acara per kategori
        $acaraPerKategori = KategoriAcara::withCount('acaras')->get();

        return view('dashboard', compact(
            'jumlahKlien',
            'jumlahAcara',
            'jumlahKategori',
            'jumlahVendor',
            'rataRating',
            'klienTerbaru',
            'vendorTerbaru',
            'acaras',
            'acaraPerKategori'
        ));
    }
}
