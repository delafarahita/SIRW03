<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            [
                'id_kriteria' => 1,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Pendapatan',
                'bobot' => 0.3,
                'jenis' => 'Benefit',
            ],
            [
                'id_kriteria' => 2,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Usia',
                'bobot' => 0.2,
                'jenis' => 'Benefit',
            ],
            [
                'id_kriteria' => 3,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Kondisi Rumah',
                'bobot' => 0.25,
                'jenis' => 'Benefit',
            ],
            [
                'id_kriteria' => 4,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Jumlah Anggota Keluarga',
                'bobot' => 0.15,
                'jenis' => 'Benefit',
            ],
            [
                'id_kriteria' => 5,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Aset',
                'bobot' => 0.1,
                'jenis' => 'Benefit',
            ]
        ];
        DB::table('data_kriteria')->insert($kriteria);
    }
}
