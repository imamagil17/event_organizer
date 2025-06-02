<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis_layanan',
        'kontak',
        'biaya',
    ];

    public function acaras()
    {
        return $this->belongsToMany(Acara::class, 'acara_vendor')->withTimestamps();
    }
}
