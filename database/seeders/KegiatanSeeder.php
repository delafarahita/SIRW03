<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $kegiatan = [
            [
                'nama' => 'Kerja bakti lingkungan TPU Mergosono',
                'jenis' => 'Sosial',
                'deskripsi' => 'Membersihkan pemakaman umum',
                'image_path' => 'images/kerja_bakti_TPU.jpg',
                'tanggal' => '2024-05-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perawatan vertikal garden',
                'jenis' => 'Sosial',
                'deskripsi' => 'Merawat tanaman di vertikal garden',
                'image_path' => 'images/perawatan_vertikal_garden.jpg',
                'tanggal' => '2024-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu',
                'jenis' => 'Sosial',
                'deskripsi' => 'Posyandu balita dan lansia',
                'image_path' => 'images/posyandu.jpg',
                'tanggal' => '2024-07-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('kegiatans')->insert($kegiatan);
    }
}
