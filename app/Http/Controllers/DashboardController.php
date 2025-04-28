<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use App\Models\Acara;
use App\Models\KategoriAcara;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKlien = Klien::count();
        $jumlahAcara = Acara::count();
        $jumlahKategori = KategoriAcara::count();
        $acaras = Acara::with('klien')->latest()->take(5)->get(); // ambil 5 acara terbaru

        return view('dashboard', compact('jumlahKlien', 'jumlahAcara', 'jumlahKategori', 'acaras'));
    }
}
