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
                'nama_rt' => 'RT 001',
            ],
            [
                'id_rt'=> 2,
                'nama_rt' => 'RT 002',
            ],
        ];

        DB::table('rt')->insert($rt);
    }
}
