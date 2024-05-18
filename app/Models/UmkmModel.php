<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = 'umkm'; // Nama tabel di database

    protected $primaryKey = 'id_umkm';
    
    public $timestamps = false;
    protected $fillable = [
        'nama_umkm',
        'kategori_umkm',
        'pemilik_umkm',
        'alamat_umkm',
        'id_rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'foto_umkm',
        'deskripsi_umkm',
    ]; // Kolom yang dapat diisi

    public static $kategori_umkm =[
        "Dagang", "Jasa"
    ];


    public function rt(): BelongsTo
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id');
    }



}
