<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJasaModel extends Model
{
    use HasFactory;

    protected $table = 'kategori_jasa';
    protected $fillable = [
        'nama_umkm',
        'kategori_umkm',
        'pemilik_umkm',
        'alamat_umkm',
        'id_rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'image_path',
        'deskripsi_umkm',
    ];
}
