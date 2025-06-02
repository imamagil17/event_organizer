<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class JadwalAcara extends Model
{
    use HasFactory;

    protected $fillable = [
        'acara_id',
        'waktu_mulai',
        'waktu_selesai',
        'judul_kegiatan',
        'deskripsi',
    ];

    protected $casts = [
    'waktu_mulai' => 'datetime:H:i',
    'waktu_selesai' => 'datetime:H:i',
    ];

    // Tidak perlu casts jika kolomnya bertipe TIME di database

    // Accessor agar waktu_mulai dan waktu_selesai bisa diformat langsung
    public function getWaktuMulaiFormattedAttribute()
    {
        return $this->waktu_mulai
            ? Carbon::createFromFormat('H:i:s', $this->waktu_mulai)->format('H:i')
            : null;
    }

    public function getWaktuSelesaiFormattedAttribute()
    {
        return $this->waktu_selesai
            ? Carbon::createFromFormat('H:i:s', $this->waktu_selesai)->format('H:i')
            : null;
    }

    public function acara()
    {
        return $this->belongsTo(Acara::class);
    }

        public function jadwalAcaras()
    {
        return $this->hasMany(JadwalAcara::class);
    }
}
