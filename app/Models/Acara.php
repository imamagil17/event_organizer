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
    ];

    public function klien()
    {
        return $this->belongsTo(Klien::class);
    }

    public function kategoriAcara()
    {
        return $this->belongsTo(KategoriAcara::class);
    }
}
