<?php

namespace Database\Factories;

use App\Models\DataPendudukModel;
use App\Models\KKModel;
use App\Models\RTModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DataPendudukModelFactory extends Factory
{
    protected $model = DataPendudukModel::class;

    public function definition()
    {
        return [
            'nik' => 1234567890123458,
            'no_kk' => 1234567890123456,
            'nama' => $this->faker->name,
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'gol_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'alamat' => $this->faker->city,
            'rw' => $this->faker->numberBetween(1, 10),
            'id_rt' => RTModel::factory(),
            'kelurahan' => $this->faker->city,
            'kecamatan' => $this->faker->city,
            'kewarganegaraan' => 'WNI',
            'pekerjaan' => $this->faker->randomElement([
                "Belum/ Tidak Bekerja",
                "Mengurus Rumah Tagga",
                "Pelajar/ Mahasiswa",
                "Pensiunan",
                "Pewagai Negeri Sipil",
                "Tentara Nasional Indonesia",
                "Kepolisisan RI",
                "Perdagangan",
                "Petani/ Pekebun",
                "Peternak",
                "Nelayan/ Perikanan",
                "Industri",
                "Konstruksi",
                "Transportasi",
                "Karyawan Swasta",
                "Karyawan BUMN",
                "Karyawan BUMD",
                "Karyawan Honorer",
                "Buruh Harian Lepas",
                "Buruh Tani/ Perkebunan",
                "Buruh Nelayan/ Perikanan",
                "Buruh Peternakan",
                "Pembantu Rumah Tangga",
                "Tukang Cukur",
                "Tukang Listrik",
                "Tukang Batu",
                "Tukang Kayu",
                "Tukang Sol Sepatu",
                "Tukang Las/ Pandai Besi",
                "Tukang Jahit",
                "Tukang Gigi",
                "Penata Rias",
                "Penata Busana",
                "Penata Rambut",
                "Mekanik",
                "Seniman",
                "Tabib",
                "Paraji",
                "Perancang Busana",
                "Penterjemah",
                "Imam Masjid",
                "Pendeta",
                "Pastor",
                "Wartawan",
                "Ustadz/ Mubaligh",
                "Juru Masak",
                "Promotor Acara",
                "Anggota DPR-RI",
                "Anggota DPD",
                "Anggota BPK",
                "Presiden",
                "Wakil Presiden",
                "Anggota Mahkamah Konstitusi",
                "Anggota Kabinet/ Kementerian",
                "Duta Besar",
                "Gubernur",
                "Wakil Gubernur",
                "Bupati",
                "Wakil Bupati",
                "Walikota",
                "Wakil Walikota",
                "Anggota DPRD Provinsi",
                "Anggota DPRD Kabupaten/ Kota",
                "Dosen",
                "Guru",
                "Pilot",
                "Pengacara",
                "Notaris",
                "Arsitek",
                "Akuntan",
                "Konsultan",
                "Dokter",
                "Bidan",
                "Perawat",
                "Apoteker",
                "Psikiater/ Psikolog",
                "Penyiar Televisi",
                "Penyiar Radio",
                "Pelaut",
                "Peneliti",
                "Sopir",
                "Pialang",
                "Paranormal",
                "Pedagang",
                "Perangkat Desa",
                "Kepala Desa",
                "Biarawati",
                "Wiraswasta"
            ]),
            'agama' => $this->faker->randomElement(['islam', 'katolik', 'protestan', 'hindu', 'budha', 'konghucu']),
            'domisili' => $this->faker->randomElement(['penduduk setempat', 'penduduk setempat berdomisili di tempat lain', 'penduduk dari luar']),
        ];
    }
}
