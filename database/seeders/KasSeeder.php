<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kas = [
            [
                'id_rt' => 1,
                'keterangan' => 'MCK',
                'tanggal' => '2024-04-30',
                'pemasukan' => 500000,
                'pengeluaran' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_rt' => 2,
                'keterangan' => 'Sampah',
                'tanggal' => '2024-05-10',
                'pemasukan' => 500000,
                'pengeluaran' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_rt' => 1,
                'keterangan' => 'Perbaikan vertikal garden',
                'tanggal' => '2024-05-15',
                'pemasukan' => 0,
                'pengeluaran' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_rt' => 2,
                'keterangan' => 'Sumbangan',
                'tanggal' => '2024-05-18',
                'pemasukan' => 0,
                'pengeluaran' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('kas')->insert($kas);
    }
}
