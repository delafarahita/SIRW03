<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = 'umkms'; // Nama tabel di database
    protected $fillable = [
        'nama_usaha',
        'nama_pemilik_usaha',
        'alamat_usaha',
        'id_rt',
        'id_rw',
        'kelurahan',
        'kecamatan',
        'upload_foto_usaha',
        'deskripsi_usaha',
        'kategori_usaha'
    ]; // Kolom yang dapat diisi
}
