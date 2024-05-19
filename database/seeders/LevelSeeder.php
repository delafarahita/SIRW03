<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_level' => 1, 'kode_level' => 'RW', 'nama_level' => 'Rukun Warga'],
            ['id_level' => 2, 'kode_level' => 'RT', 'nama_level' => 'Rukun Tetangga'],
        ];
        DB::table('m_level')->insert($data);
    }
}
