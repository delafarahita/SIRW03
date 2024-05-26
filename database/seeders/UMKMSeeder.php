<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = [
            [
                'id_umkm' => '1',
                'nama_umkm' => 'PT. Cakra',
                'kategori_umkm' => 'Jasa',
                'pemilik_umkm' => 'Cakra',
                'alamat_umkm' => 'JL.Mergosono V',
                'id_rt' => '1',
                'rw' => '1',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Mergosono',
                'image_path' => 'jasa_1.jpg',
                'deskripsi_umkm' => 'Cakra',
            ]
        ];
    }
}
