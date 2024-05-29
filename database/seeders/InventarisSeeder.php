<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inventaris = [
            [
                'inventaris_id' => 1,
                'nama_barang' => 'Komputer',
                'jenis_barang' => 'Elektronik',
                'status_barang' => 'Tersedia',
            ],
            [
                'inventaris_id' => 2,
                'nama_barang' => 'Printer',
                'jenis_barang' => 'Elektronik',
                'status_barang' => 'Tersedia',
            ],
            [
                'inventaris_id' => 3,
                'nama_barang' => 'Meja Kantor',
                'jenis_barang' => 'Furniture',
                'status_barang' => 'Tersedia',
            ],
        ];

        DB::table('inventaris')->insert($inventaris);
    }
}
