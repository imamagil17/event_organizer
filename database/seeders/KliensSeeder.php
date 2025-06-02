<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KliensSeeder extends Seeder
{
    public function run()
    {
        DB::table('kliens')->insert([
            ['nama' => 'Budi Santoso 1', 'email' => 'budi1@1.com', 'telepon' => '081200000001', 'alamat' => 'Jl. Mawar No. 1, Jakarta', 'jenis_klien' => 'perorangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PT. Sukses Makmur 2', 'email' => 'contact2@suksesmakmur.co.id', 'telepon' => '0215550002', 'alamat' => 'Jl. Merdeka No. 2, Jakarta', 'jenis_klien' => 'perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yayasan Harapan Bangsa 3', 'email' => 'info3@harapanbangsa.org', 'telepon' => '0227770003', 'alamat' => 'Jl. Kenanga No. 3, Bandung', 'jenis_klien' => 'organisasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Ani Wijaya 4', 'email' => 'ani4@4.com', 'telepon' => '081200000004', 'alamat' => 'Jl. Melati No. 4, Surabaya', 'jenis_klien' => 'perorangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PT. Maju Jaya 5', 'email' => 'contact5@majajaya.co.id', 'telepon' => '0215550005', 'alamat' => 'Jl. Sudirman No. 5, Bandung', 'jenis_klien' => 'perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yayasan Cinta Alam 6', 'email' => 'info6@cintaalam.org', 'telepon' => '0227770006', 'alamat' => 'Jl. Flamboyan No. 6, Semarang', 'jenis_klien' => 'organisasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dewi Lestari 7', 'email' => 'dewi7@7.com', 'telepon' => '081200000007', 'alamat' => 'Jl. Anggrek No. 7, Medan', 'jenis_klien' => 'perorangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PT. Sentosa Abadi 8', 'email' => 'contact8@sentosaabadi.co.id', 'telepon' => '0215550008', 'alamat' => 'Jl. Thamrin No. 8, Jakarta', 'jenis_klien' => 'perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yayasan Pendidikan Nusantara 9', 'email' => 'info9@nusantara.org', 'telepon' => '0227770009', 'alamat' => 'Jl. Dahlia No. 9, Yogyakarta', 'jenis_klien' => 'organisasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Joko Prasetyo 10', 'email' => 'joko10@10.com', 'telepon' => '081200000010', 'alamat' => 'Jl. Kenari No. 10, Bali', 'jenis_klien' => 'perorangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PT. Cahaya Gemilang 11', 'email' => 'contact11@cahayagemilang.co.id', 'telepon' => '0215550011', 'alamat' => 'Jl. Gajah Mada No. 11, Malang', 'jenis_klien' => 'perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yayasan Sosial Harapan 12', 'email' => 'info12@sosialharapan.org', 'telepon' => '0227770012', 'alamat' => 'Jl. Sawo No. 12, Palembang', 'jenis_klien' => 'organisasi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rina Saputra 13', 'email' => 'rina13@13.com', 'telepon' => '081200000013', 'alamat' => 'Jl. Anggrek No. 13, Pontianak', 'jenis_klien' => 'perorangan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'PT. Karya Mandiri 14', 'email' => 'contact14@karyamandiri.co.id', 'telepon' => '0215550014', 'alamat' => 'Jl. Pahlawan No. 14, Bandung', 'jenis_klien' => 'perusahaan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yayasan Pelita Harapan 15', 'email' => 'info15@pelitaharapan.org', 'telepon' => '0227770015', 'alamat' => 'Jl. Rajawali No. 15, Surabaya', 'jenis_klien' => 'organisasi', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
