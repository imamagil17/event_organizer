<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Acara;

class AcaraVendorsSeeder extends Seeder
{
    public function run()
    {
        // Hapus dulu semua data pivot acara_vendor supaya tidak duplikat
        DB::table('acara_vendor')->truncate();

        // Data relasi acara-vendor
        $data = [
            ['acara_id' => 1, 'vendor_id' => 1],
            ['acara_id' => 1, 'vendor_id' => 2],
            ['acara_id' => 2, 'vendor_id' => 1],
            ['acara_id' => 2, 'vendor_id' => 5],
            ['acara_id' => 3, 'vendor_id' => 3],
            ['acara_id' => 3, 'vendor_id' => 4],
            ['acara_id' => 4, 'vendor_id' => 2],
            ['acara_id' => 4, 'vendor_id' => 6],
            ['acara_id' => 5, 'vendor_id' => 7],
            ['acara_id' => 6, 'vendor_id' => 8],
            ['acara_id' => 7, 'vendor_id' => 9],
            ['acara_id' => 8, 'vendor_id' => 10],
            ['acara_id' => 9, 'vendor_id' => 11],
            ['acara_id' => 10, 'vendor_id' => 12],
            ['acara_id' => 11, 'vendor_id' => 13],
        ];

        // Insert pivot table acara_vendor
        foreach ($data as $item) {
            DB::table('acara_vendor')->insert([
                'acara_id' => $item['acara_id'],
                'vendor_id' => $item['vendor_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        foreach (Acara::all() as $acara) {
            $total = $acara->vendors()->sum('biaya');
            $acara->total_biaya = $total;
            $acara->save();
        }
    }
}
