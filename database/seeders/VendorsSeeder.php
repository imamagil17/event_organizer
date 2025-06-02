<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('vendors')->insert([
            ['nama' => 'Catering Mantap', 'jenis_layanan' => 'Catering', 'kontak' => '081234567001', 'biaya' => 1500000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dekorasi Indah', 'jenis_layanan' => 'Dekorasi', 'kontak' => '081234567002', 'biaya' => 2000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sound System Pro', 'jenis_layanan' => 'Sound System', 'kontak' => '081234567003', 'biaya' => 1000000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dokumentasi Jaya', 'jenis_layanan' => 'Fotografi & Videografi', 'kontak' => '081234567004', 'biaya' => 2500000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'MC Hebat', 'jenis_layanan' => 'MC', 'kontak' => '081234567005', 'biaya' => 750000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Entertainment Plus', 'jenis_layanan' => 'Hiburan', 'kontak' => '081234567006', 'biaya' => 1800000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Transportasi Aman', 'jenis_layanan' => 'Transportasi', 'kontak' => '081234567007', 'biaya' => 1200000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Pakaian Elegan', 'jenis_layanan' => 'Sewa Busana', 'kontak' => '081234567008', 'biaya' => 2200000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Tenda Segar', 'jenis_layanan' => 'Sewa Tenda', 'kontak' => '081234567009', 'biaya' => 900000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Makeup Artist Pro', 'jenis_layanan' => 'Makeup Artist', 'kontak' => '081234567010', 'biaya' => 1100000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Lighting Specialist', 'jenis_layanan' => 'Lighting', 'kontak' => '081234567011', 'biaya' => 950000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Katering Sehat', 'jenis_layanan' => 'Catering', 'kontak' => '081234567012', 'biaya' => 1400000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dekorasi Mewah', 'jenis_layanan' => 'Dekorasi', 'kontak' => '081234567013', 'biaya' => 2300000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sound System Extra', 'jenis_layanan' => 'Sound System', 'kontak' => '081234567014', 'biaya' => 1100000, 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dokumentasi Kreatif', 'jenis_layanan' => 'Fotografi & Videografi', 'kontak' => '081234567015', 'biaya' => 2600000, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
