<?php

use Illuminate\Database\Seeder;
use App\Models\DataPendudukModel;

class DataPendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data penduduk yang akan diisi
        $penduduk = [
            [
                'no_kk' => 123456789,
                'nama' => 'John Doe',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1990-05-15',
                'gol_darah' => 'A',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Contoh No. 123',
                'rw' => '001',
                'id_rt' => 1,
                'kelurahan' => 'Contoh Kelurahan',
                'kecamatan' => 'Contoh Kecamatan',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'Karyawan Swasta',
                'agama' => 'islam',
                'domisili' => 'penduduk setempat'
            ],
            // Tambahkan data penduduk lainnya sesuai kebutuhan
        ];

        // Loop untuk memasukkan data penduduk ke dalam database
        foreach ($penduduk as $data) {
            DataPendudukModel::create($data);
        }
    }
}
