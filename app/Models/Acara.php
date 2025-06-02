<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        'lokasi',
        'deskripsi',
        'klien_id',
        'kategori_acara_id',
        'jumlah_tamu',
        'total_biaya',
        'catatan_laporan',
        'rating',
        'feedback',
    ];

    // Relasi ke Klien
    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    // Relasi ke Kategori Acara
    public function kategoriAcara()
    {
        return $this->belongsTo(KategoriAcara::class);
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'acara_vendor')
                    ->withPivot('peran') // akses kolom tambahan
                    ->withTimestamps();
    }

    // Relasi ke Jadwal Acara
    public function jadwalAcaras()
    {
        return $this->hasMany(JadwalAcara::class);
    }
}
