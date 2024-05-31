<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('img_kegiatan')->delete(Storage::disk('img_kegiatan')->allFiles());

        $kegiatan = [
            [
                'nama' => 'Kerja bakti lingkungan TPU Mergosono',
                'jenis' => 'Sosial',
                'deskripsi' => 'Membersihkan pemakaman umum',
                // 'image_path' => 'storage/image_path/kerja_bakti_TPU.jpg',
                'image_path' => $this->storeImage('kerja_bakti_TPU.jpg'),
                'tanggal' => '2024-05-30',
                'alamat' => 'Jl. Kol.Sugiono No. 123, Tempat Pemakaman Umum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Perawatan vertikal garden',
                'jenis' => 'Sosial',
                'deskripsi' => 'Merawat tanaman di vertikal garden',
                // 'image_path' => 'storage/image_path/perawatan_vertikal_garden.jpg',
                'image_path' => $this->storeImage('perawatan_vertikal_garden.jpg'),
                'tanggal' => '2024-06-15',
                'alamat' => 'Jl. Kol.Sugiono No. 124, Vertikal Garden',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Posyandu',
                'jenis' => 'Sosial',
                'deskripsi' => 'Posyandu balita dan lansia',
                // 'image_path' => 'storage/image_path/posyandu.jpg',
                'image_path' => $this->storeImage('posyandu.jpg'),
                'tanggal' => '2024-07-20',
                'alamat' => 'Jl. Kol.Sugiono No. 125',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        DB::table('kegiatans')->insert($kegiatan);

    }

    private function storeImage(string $filename): string
    {
        $imagePath = public_path("assets/img/". $filename);
        $imageContent = file_get_contents($imagePath);
        Storage::disk('img_kegiatan')->put($filename, $imageContent);
        return $filename;
    }

}
