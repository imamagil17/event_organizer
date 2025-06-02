<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcaraSeeder extends Seeder
{
    public function run()
    {
        DB::table('acaras')->insert([
            ['judul' => 'Pernikahan Budi & Ani', 'tanggal' => '2025-06-10 10:00:00', 'lokasi' => 'Gedung Serbaguna Jakarta', 'kategori_acara_id' => 1, 'klien_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Ulang Tahun Rina', 'tanggal' => '2025-07-05 18:00:00', 'lokasi' => 'Restoran Bintang Lima', 'kategori_acara_id' => 2, 'klien_id' => 13, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Konferensi Tech Indonesia', 'tanggal' => '2025-08-15 08:00:00', 'lokasi' => 'Hotel Grand City', 'kategori_acara_id' => 3, 'klien_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Peluncuran Produk X', 'tanggal' => '2025-09-20 09:00:00', 'lokasi' => 'Balai Kartini', 'kategori_acara_id' => 4, 'klien_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Seminar Marketing 2025', 'tanggal' => '2025-10-10 08:30:00', 'lokasi' => 'Gedung Seminar Bandung', 'kategori_acara_id' => 5, 'klien_id' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Pameran Seni Rupa', 'tanggal' => '2025-11-01 10:00:00', 'lokasi' => 'Galeri Nasional', 'kategori_acara_id' => 6, 'klien_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Festival Musik Jakarta', 'tanggal' => '2025-12-12 15:00:00', 'lokasi' => 'Stadion Gelora Bung Karno', 'kategori_acara_id' => 7, 'klien_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Gathering PT Maju Jaya', 'tanggal' => '2025-12-20 09:00:00', 'lokasi' => 'Villa Lembang', 'kategori_acara_id' => 8, 'klien_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Pesta Anak-anak TK Harapan', 'tanggal' => '2025-06-18 10:00:00', 'lokasi' => 'TK Harapan Bangsa', 'kategori_acara_id' => 9, 'klien_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Workshop Melukis', 'tanggal' => '2025-07-25 09:00:00', 'lokasi' => 'Studio Seni Bandung', 'kategori_acara_id' => 10, 'klien_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Acara Amal Peduli Anak', 'tanggal' => '2025-08-30 10:00:00', 'lokasi' => 'Gedung Serbaguna Semarang', 'kategori_acara_id' => 11, 'klien_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Rapat Umum Tahunan', 'tanggal' => '2025-09-12 09:00:00', 'lokasi' => 'Hotel Santika', 'kategori_acara_id' => 12, 'klien_id' => 14, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Turnamen Bola Voli', 'tanggal' => '2025-10-05 07:00:00', 'lokasi' => 'GOR Jakarta', 'kategori_acara_id' => 13, 'klien_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Pelatihan Karyawan PT Sentosa', 'tanggal' => '2025-11-15 08:00:00', 'lokasi' => 'Hotel Santika Bandung', 'kategori_acara_id' => 14, 'klien_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['judul' => 'Pesta Pernikahan Tradisional Joko & Rina', 'tanggal' => '2025-12-25 10:00:00', 'lokasi' => 'Balai Adat Yogyakarta', 'kategori_acara_id' => 15, 'klien_id' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
