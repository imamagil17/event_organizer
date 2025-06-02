<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriAcaraSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategori_acaras')->insert([
            ['nama' => 'Pernikahan', 'deskripsi' => 'Acara pernikahan dan resepsi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ulang Tahun', 'deskripsi' => 'Perayaan ulang tahun', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Konferensi', 'deskripsi' => 'Acara konferensi bisnis atau akademik', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Peluncuran Produk', 'deskripsi' => 'Acara peluncuran produk baru', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Seminar', 'deskripsi' => 'Acara seminar dan workshop', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pameran', 'deskripsi' => 'Pameran dagang dan seni', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Festival Musik', 'deskripsi' => 'Acara festival musik dan konser', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Gathering Perusahaan', 'deskripsi' => 'Acara gathering dan team building perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pesta Anak-anak', 'deskripsi' => 'Pesta ulang tahun dan acara anak-anak', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Workshop Kreatif', 'deskripsi' => 'Workshop seni dan kreatifitas', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Acara Amal', 'deskripsi' => 'Acara penggalangan dana dan amal', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rapat Umum', 'deskripsi' => 'Rapat umum dan pertemuan penting', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Acara Olahraga', 'deskripsi' => 'Turnamen dan acara olahraga', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pelatihan Karyawan', 'deskripsi' => 'Pelatihan dan pengembangan karyawan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pesta Pernikahan Tradisional', 'deskripsi' => 'Acara pernikahan dengan adat tradisional', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
