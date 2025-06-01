<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Carbon\Carbon;
use App\Models\Acara;
use App\Models\KategoriAcara;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKlien = \App\Models\Klien::count();
        $jumlahAcara = Acara::count();
        $jumlahKategori = \App\Models\KategoriAcara::count();
    
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

        return view('dashboard', compact('jumlahKlien', 'jumlahAcara', 'jumlahKategori', 'acaras'));
    }
}
