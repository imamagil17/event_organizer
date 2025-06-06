<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'alamat',
        'jenis_klien',
    ];

    // Relasi ke Acara (satu klien bisa membuat banyak acara)
    public function acaras()
    {
        return $this->hasMany(Acara::class);
    }
}
