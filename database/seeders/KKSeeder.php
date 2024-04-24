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
                'no_kk' => 10203040506070809,
                'kepala_keluarga' => 'Subagiyo',
            ],
            [
                'no_kk' => 20203040506070809,
                'kepala_keluarga' => 'Anto',
            ],
            // Tambahkan data keluarga lainnya sesuai kebutuhan
        ];

        DB::table('kk')->insert($keluarga);
    }
}
