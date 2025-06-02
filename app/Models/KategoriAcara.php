<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriAcara extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi'];

    // Relasi ke Acara (satu kategori bisa memiliki banyak acara)
    public function acaras()
    {
        return $this->hasMany(Acara::class, 'kategori_acara_id');
    }
}
