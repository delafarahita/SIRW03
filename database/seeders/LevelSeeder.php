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
            ['level_id' => 1, 'level_kode' => 'RW', 'level_nama' => 'Rukun Warga'],
            ['level_id' => 2, 'level_kode' => 'RT', 'level_nama' => 'Rukun Tetangga'],
        ];
        DB::table('m_levels')->insert($data);
    }
}
