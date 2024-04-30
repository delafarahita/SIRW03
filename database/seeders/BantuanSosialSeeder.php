<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BantuanSosialModel;

class BantuanSosialSeeder extends Seeder
{
    
    public function run(): void
    {
        BantuanSosialModel::create([
            'nama' => 'Bantuan Makanan',
            'jenis' => 'Makanan',
            'jumlah' => 100,
            'status' => 'Tersedia'
        ]);

        BantuanSosial::create([
            'nama' => 'Bantuan Pendidikan',
            'jenis' => 'Pendidikan',
            'jumlah' => 50,
            'status' => 'Tersedia'
        ]);
    }
}
