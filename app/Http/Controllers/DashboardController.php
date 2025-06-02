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
                $today = \Carbon\Carbon::now('Asia/Jakarta')->startOfDay();
                $tanggalAcara = \Carbon\Carbon::parse($acara->tanggal, 'Asia/Jakarta')->startOfDay();

                $selisih = $today->diffInDays($tanggalAcara, false);

                if ($selisih === 0) {
                    $acara->status_waktu = 'Hari Ini';
                } elseif ($selisih === 1) {
                    $acara->status_waktu = 'Besok';
                } elseif ($selisih === 2) {
                    $acara->status_waktu = 'Lusa';
                } elseif ($selisih > 2 && $selisih <= 6) {
                    $acara->status_waktu = "{$selisih} Hari Lagi";
                } elseif ($selisih >= 7 && $selisih < 14) {
                    $acara->status_waktu = 'Minggu Depan';
                } elseif ($selisih >= 14 && $selisih < 21) {
                    $acara->status_waktu = '2 Minggu Lagi';
                } elseif ($selisih >= 21 && $selisih < 30) {
                    $acara->status_waktu = '3 Minggu Lagi';
                } elseif ($selisih >= 30 && $selisih < 60) {
                    $acara->status_waktu = 'Bulan Depan';
                } elseif ($selisih < 0) {
                    $acara->status_waktu = 'Sudah Berlalu';
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
