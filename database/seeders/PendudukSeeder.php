<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataPendudukModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PendudukSeeder extends Seeder
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
                'nik' => 1203040506070809,
                'no_kk' => 1020304050607089,
                'nama' => 'Subagiyo',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '1990-05-15',
                'gol_darah' => 'A',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kol.Sugiono No. 123',
                'rw' => '001',
                'id_rt' => 1,
                'status_perkawinan' => 'KAWIN',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Kedungkandang',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'Karyawan Swasta',
                'agama' => 'islam',
                'domisili' => 'penduduk setempat'
            ],
            [
                'nik' => 2203040506070809,
                'no_kk' => 2020304050607089,
                'nama' => 'Anto',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '1990-05-15',
                'gol_darah' => 'A',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kol.Sugiono No. 124',
                'rw' => '001',
                'id_rt' => 2,
                'status_perkawinan' => 'CERAI MATI',
                'kelurahan' => 'Mergosono',
                'kecamatan' => 'Kedungkandang',
                'kewarganegaraan' => 'WNI',
                'pekerjaan' => 'Karyawan Swasta',
                'agama' => 'islam',
                'domisili' => 'penduduk setempat'
            ],
            // Tambahkan data penduduk lainnya sesuai kebutuhan
        ];

        // // Loop untuk memasukkan data penduduk ke dalam database
        // foreach ($penduduk as $data) {
        //     DataPendudukModel::create($data);
        // }
        DB::table('data_penduduk')->insert($penduduk);
    }

}
