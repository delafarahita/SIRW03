<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penilaian = [
            // Pak Budi (A1)
            ['id_penilaian' => 1, 'id_kriteria' => 1, 'id_alternatif' => 1, 'nilai' => 3],
            ['id_penilaian' => 2, 'id_kriteria' => 2, 'id_alternatif' => 1, 'nilai' => 4],
            ['id_penilaian' => 3, 'id_kriteria' => 3, 'id_alternatif' => 1, 'nilai' => 3],
            ['id_penilaian' => 4, 'id_kriteria' => 4, 'id_alternatif' => 1, 'nilai' => 3],
            ['id_penilaian' => 5, 'id_kriteria' => 5, 'id_alternatif' => 1, 'nilai' => 3],

            // Bu Ani (A2)
            ['id_penilaian' => 6, 'id_kriteria' => 1, 'id_alternatif' => 2, 'nilai' => 4],
            ['id_penilaian' => 7, 'id_kriteria' => 2, 'id_alternatif' => 2, 'nilai' => 5],
            ['id_penilaian' => 8, 'id_kriteria' => 3, 'id_alternatif' => 2, 'nilai' => 4],
            ['id_penilaian' => 9, 'id_kriteria' => 4, 'id_alternatif' => 2, 'nilai' => 3],
            ['id_penilaian' => 10, 'id_kriteria' => 5, 'id_alternatif' => 2, 'nilai' => 5],

            // Pak Suro (A3)
            ['id_penilaian' => 11, 'id_kriteria' => 1, 'id_alternatif' => 3, 'nilai' => 5],
            ['id_penilaian' => 12, 'id_kriteria' => 2, 'id_alternatif' => 3, 'nilai' => 3],
            ['id_penilaian' => 13, 'id_kriteria' => 3, 'id_alternatif' => 3, 'nilai' => 5],
            ['id_penilaian' => 14, 'id_kriteria' => 4, 'id_alternatif' => 3, 'nilai' => 4],
            ['id_penilaian' => 15, 'id_kriteria' => 5, 'id_alternatif' => 3, 'nilai' => 3],

            // Bu Siti (A4)
            ['id_penilaian' => 16, 'id_kriteria' => 1, 'id_alternatif' => 4, 'nilai' => 2],
            ['id_penilaian' => 17, 'id_kriteria' => 2, 'id_alternatif' => 4, 'nilai' => 2],
            ['id_penilaian' => 18, 'id_kriteria' => 3, 'id_alternatif' => 4, 'nilai' => 1],
            ['id_penilaian' => 19, 'id_kriteria' => 4, 'id_alternatif' => 4, 'nilai' => 2],
            ['id_penilaian' => 20, 'id_kriteria' => 5, 'id_alternatif' => 4, 'nilai' => 2],

            // Pak Darto (A5)
            ['id_penilaian' => 21, 'id_kriteria' => 1, 'id_alternatif' => 5, 'nilai' => 1],
            ['id_penilaian' => 22, 'id_kriteria' => 2, 'id_alternatif' => 5, 'nilai' => 1],
            ['id_penilaian' => 23, 'id_kriteria' => 3, 'id_alternatif' => 5, 'nilai' => 2],
            ['id_penilaian' => 24, 'id_kriteria' => 4, 'id_alternatif' => 5, 'nilai' => 1],
            ['id_penilaian' => 25, 'id_kriteria' => 5, 'id_alternatif' => 5, 'nilai' => 1],
        ];

        DB::table('data_penilaian')->insert($penilaian);
    }
}
