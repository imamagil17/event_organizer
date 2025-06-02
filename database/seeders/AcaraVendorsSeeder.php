<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcaraVendorsSeeder extends Seeder
{
    public function run()
    {
        DB::table('acara_vendor')->insert([
            ['acara_id' => 1, 'vendor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 1, 'vendor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 2, 'vendor_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 2, 'vendor_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 3, 'vendor_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 3, 'vendor_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 4, 'vendor_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 4, 'vendor_id' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 5, 'vendor_id' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 6, 'vendor_id' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 7, 'vendor_id' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 8, 'vendor_id' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 9, 'vendor_id' => 11, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 10, 'vendor_id' => 12, 'created_at' => now(), 'updated_at' => now()],
            ['acara_id' => 11, 'vendor_id' => 13, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
