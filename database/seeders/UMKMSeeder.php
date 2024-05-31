<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UMKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $umkm = [
            [
                'id_umkm' => '1',
                'nama_umkm' => 'Sate & Gule Merso',
                'kategori_umkm' => 'Dagang',
                'pemilik_umkm' => 'Aziz',
                'alamat_umkm' => 'JL.Mergosono V',
                'id_rt' => '1',
                'rw' => '3',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Mergosono',
                // 'foto_umkm' => 'storage/foto_umkm/sate_dan_gule.jpg',
                'foto_umkm' => $this->storeImage('sate_dan_gule.jpg'),
                'deskripsi_umkm' => 'Sate dan Gule Merso Spesial Aqiqah',
            ],
            [
                'id_umkm' => '2',
                'nama_umkm' => 'Warung Khasanah Bu Heni',
                'kategori_umkm' => 'Dagang',
                'pemilik_umkm' => 'Heni',
                'alamat_umkm' => 'JL.Mergosono V',
                'id_rt' => '2',
                'rw' => '3',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Mergosono',
                // 'foto_umkm' => 'storage/foto_umkm/warung_khasanah.jpg',
                'foto_umkm' => $this->storeImage('warung_khasanah.jpg'),
                'deskripsi_umkm' => 'Soto ayam dan lalapan bu heni',
            ],
            [
                'id_umkm' => '3',
                'nama_umkm' => 'Salon Narmi',
                'kategori_umkm' => 'Jasa',
                'pemilik_umkm' => 'Narmi',
                'alamat_umkm' => 'JL.Mergosono V',
                'id_rt' => '2',
                'rw' => '3',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Mergosono',
                // 'foto_umkm' => 'storage/foto_umkm/salon.jpg',
                'foto_umkm' => $this->storeImage('salon.jpg'),
                'deskripsi_umkm' => 'Salon murah dan bagus',
            ],
        ];
        DB::table('umkm')->insert($umkm);
    }

    public function storeImage(string $filename): string{
        $imagePath = public_path("assets/img/". $filename);
        $imageContent = file_get_contents($imagePath);
        Storage::disk('img_umkm')->put($filename, $imageContent);
        return $filename;
    }
}
