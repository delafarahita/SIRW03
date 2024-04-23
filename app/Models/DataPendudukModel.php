<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataPendudukModel extends Model
{
    use HasFactory;
    public $table = 'data_penduduk';
    public $primaryKey = 'NIK';

    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'gol_darah',
        'jenis_kelamin',
        'alamat',
        'rw',
        'id_rt',
        'kelurahan',
        'kecamatan',
        'kewarganegaraan',
        'pekerjaan',
        'agama',
        'domisili'
    ];

    public static $pekerjaan = [
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
    ];

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id');
    }
    public function kk(): BelongsTo
    {
        return $this->belongsTo(KKModel::class, 'no_kk', 'no_kk');
    }
}
