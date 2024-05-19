<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_user' => 1,
                'id_level' => 1,
                'username' => 'rw03',
                'nama_user' => 'Subagiyo',
                'password' => Hash::make('12345'),
            ],
            [
                'id_user' => 2,
                'id_level' => 2,
                'username' => 'rt09',
                'nama_user' => 'M. Soin Musyafak',
                'password' => Hash::make('12345'),
            ],
        ];
        DB::table('m_user')->insert($data);
    }
}
