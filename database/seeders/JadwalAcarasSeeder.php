<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class JadwalAcarasSeeder extends Seeder
{
    public function run()
    {
        // Pastikan acara_id valid (misal acara_id 1 sampai 5 sudah ada)
        $jadwalAcaras = [
            [
                'acara_id' => 1,
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '09:00:00',
                'judul_kegiatan' => 'Pembukaan Acara',
                'deskripsi' => 'Pembukaan resmi acara oleh MC.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 1,
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '10:30:00',
                'judul_kegiatan' => 'Sesi Presentasi Produk',
                'deskripsi' => 'Presentasi produk terbaru oleh tim marketing.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 2,
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '11:00:00',
                'judul_kegiatan' => 'Workshop Desain Grafis',
                'deskripsi' => 'Workshop untuk pemula dalam desain grafis.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 2,
                'waktu_mulai' => '11:15:00',
                'waktu_selesai' => '12:00:00',
                'judul_kegiatan' => 'Sesi Tanya Jawab',
                'deskripsi' => 'Diskusi dan tanya jawab dengan pembicara.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 3,
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '14:30:00',
                'judul_kegiatan' => 'Seminar Keuangan',
                'deskripsi' => 'Seminar tentang manajemen keuangan pribadi.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 3,
                'waktu_mulai' => '14:45:00',
                'waktu_selesai' => '15:30:00',
                'judul_kegiatan' => 'Networking Session',
                'deskripsi' => 'Kesempatan berjejaring antar peserta seminar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 4,
                'waktu_mulai' => '08:30:00',
                'waktu_selesai' => '09:30:00',
                'judul_kegiatan' => 'Registrasi Peserta',
                'deskripsi' => 'Registrasi dan pembagian kit acara.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 4,
                'waktu_mulai' => '09:30:00',
                'waktu_selesai' => '11:00:00',
                'judul_kegiatan' => 'Pelatihan Public Speaking',
                'deskripsi' => 'Pelatihan kemampuan berbicara di depan umum.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 5,
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '11:30:00',
                'judul_kegiatan' => 'Rapat Evaluasi',
                'deskripsi' => 'Rapat evaluasi hasil proyek terakhir.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 5,
                'waktu_mulai' => '11:45:00',
                'waktu_selesai' => '12:30:00',
                'judul_kegiatan' => 'Diskusi Strategi',
                'deskripsi' => 'Diskusi strategi bisnis ke depan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 6,
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '14:00:00',
                'judul_kegiatan' => 'Sesi Pembekalan',
                'deskripsi' => 'Pembekalan untuk peserta training.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 6,
                'waktu_mulai' => '14:15:00',
                'waktu_selesai' => '15:45:00',
                'judul_kegiatan' => 'Simulasi Praktik',
                'deskripsi' => 'Simulasi praktik lapangan oleh peserta.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 7,
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '09:00:00',
                'judul_kegiatan' => 'Sambutan Pembukaan',
                'deskripsi' => 'Sambutan dari panitia acara.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 7,
                'waktu_mulai' => '09:15:00',
                'waktu_selesai' => '10:30:00',
                'judul_kegiatan' => 'Sesi Motivasi',
                'deskripsi' => 'Sesi motivasi oleh pembicara tamu.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'acara_id' => 8,
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '11:00:00',
                'judul_kegiatan' => 'Workshop Fotografi',
                'deskripsi' => 'Workshop dasar fotografi digital.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('jadwal_acaras')->insert($jadwalAcaras);
    }
}
