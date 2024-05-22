<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatans'; // Nama tabel di database

    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nama',
        'jenis',
        'deskripsi',
        'image_path',
        'tanggal',
    ]; // Kolom yang dapat diisi

    public static $jenis =[
        "Sosial", "Keagamaan"
    ];
}
