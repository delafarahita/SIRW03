<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = [
            [
                'id_alternatif' => 1,
                'nama_alternatif' => 'Budi'
            ],
            [
                'id_alternatif' => 2,
                'nama_alternatif' => 'Ani'
            ],
            [
                'id_alternatif' => 3,
                'nama_alternatif' => 'Suro'
            ],
            [
                'id_alternatif' => 4,
                'nama_alternatif' => 'Siti'
            ],
            [
                'id_alternatif' => 5,
                'nama_alternatif' => 'Darto'
            ]
        ];
        DB::table('data_alternatif')->insert($alternatif);
    }
}
