<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PengaduanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('img_keluhan')->delete(Storage::disk('img_keluhan')->allFiles());

        $keluhan = [
            [
                'id' => 1,
                'nama_penduduk' => 'Ana',
                'rt' => 1,
                'keluhan' => 'Pak, sampah di gg.5 menyumbat aliran sungai',
                'foto' => $this->storeImage('sampah_menyumbat.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama_penduduk' => 'Heru',
                'rt' => 2,
                'keluhan' => 'Ada warga yang mengadakan acara hingga menutup akses jalan umum',
                'foto' => $this->storeImage('tenda.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama_penduduk' => 'Hasanudin',
                'rt' => 3,
                'keluhan' => 'Tetangga sebelah rumah mengganggu ketenangan, beliau mendengarkan musik terlalu keras ketika terdengar adzan',
                'foto' => $this->storeImage('sound_system.jpeg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama_penduduk' => 'Abi',
                'rt' => 4,
                'keluhan' => 'Ada mobil parkir di depan rumah selama berhari-hari. Mohon ditindaklanjuti',
                'foto' => $this->storeImage('mobil.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('keluhans')->insert($keluhan);
    }

    private function storeImage(string $filename): string
    {
        $imagePath = public_path("assets/img/". $filename);
        $imageContent = file_get_contents($imagePath);
        Storage::disk('img_keluhan')->put($filename, $imageContent);
        return $filename;
    }
}
