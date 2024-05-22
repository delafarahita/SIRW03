<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan'; // Nama tabel di database

    protected $primaryKey = 'id_kegiatan';

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama',
        'jenis',
        'deskripsi',
        'image_path',
        'tanggal',
    ]; // Kolom yang dapat diisi

    public static $kategori_kegiatan =[
        "Sosial", "Keagamaan"
    ];
}
