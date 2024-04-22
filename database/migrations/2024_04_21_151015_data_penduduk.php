<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_penduduk', function (Blueprint $table) {
            $table->id('nik');
            $table->unsignedBigInteger('no_kk')->index();
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->enum('gol_darah', ['A', 'AB', 'B', 'O']);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 50);
            $table->string('rw', 5);
            $table->unsignedBigInteger('id_rt')->index();
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->enum('kewarganegaraan', ['WNA', 'WNI']);
            $table->enum('pekerjaan', [
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
            ]);
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'budha', 'konghucu']);
            $table->enum('domisili', ['penduduk setempat' , 'penduduk setempat berdomisili di tempat lain', 'penduduk dari luar']);

            $table->foreign('no_kk')->references('no_kk')->on('kk');
            $table->foreign('id_rt')->references('id_rt')->on('rt');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_penduduk');
    }
};
