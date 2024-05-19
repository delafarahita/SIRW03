<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PinjamInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pinjamInventaris = [
            [
                'inventaris_id' => 1,
                'peminjam' => 'John Doe',
                'tanggal_pinjam' => '2023-05-01',
                'tanggal_kembali' => '2023-05-08',
            ],
            [
                'inventaris_id' => 2,
                'peminjam' => 'Jane Smith',
                'tanggal_pinjam' => '2023-05-03',
                'tanggal_kembali' => null,
            ],
            [
                'inventaris_id' => 3,
                'peminjam' => 'Bob Johnson',
                'tanggal_pinjam' => '2023-05-10',
                'tanggal_kembali' => '2023-05-15',
            ],
        ];

        DB::table('pinjam_inventaris')->insert($pinjamInventaris);
    }
}
