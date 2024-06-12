<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rt = [
            [
                'id_rt'=> 1,
                'nama_rt' => 'Aziz',
            ],
            [
                'id_rt'=> 2,
                'nama_rt' => 'Halur',
            ],
        ];

        DB::table('rt')->insert($rt);
    }
}
