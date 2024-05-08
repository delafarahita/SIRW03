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
                'id' => 1,
                'nama_barang' => 'Meja',
                'jenis_barang' => 'Kantor',
                'jumlah_barang' => 10,
            ],
            [
                'id' => 2,
                'nama_barang' => 'Kursi',
                'jenis_barang' => 'Kantor',
                'jumlah_barang' => 20,
            ],
        ];

        DB::table('inventaris')->insert($inventaris);
    }
}
