<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data keluarga yang akan diisi
        $keluarga = [
            [
                'no_kk' => 1020304050607089,
                'kepala_keluarga' => 'Subagiyo',
            ],
            [
                'no_kk' => 2020304050607089,
                'kepala_keluarga' => 'Anto',
            ],
            // Tambahkan data keluarga lainnya sesuai kebutuhan
        ];

        DB::table('kk')->insert($keluarga);
    }
}
