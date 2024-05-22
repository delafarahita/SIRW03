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
                'jumlah_barang' => 15,
                'status_barang' => 'ada',
            ],
            [
                'inventaris_id' => 2,
                'nama_barang' => 'Printer',
                'jenis_barang' => 'Elektronik',
                'jumlah_barang' => 5,
                'status_barang' => 'ada',
            ],
            [
                'inventaris_id' => 3,
                'nama_barang' => 'Meja Kantor',
                'jenis_barang' => 'Furniture',
                'jumlah_barang' => 20,
                'status_barang' => 'ada',
            ],
        ];

        DB::table('inventaris')->insert($inventaris);
    }
}
