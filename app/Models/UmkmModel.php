<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = 'umkms'; // Nama tabel di database
<<<<<<< HEAD
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
=======
    protected $fillable = ['nama_usaha', 'nama_pemilik_usaha', 'alamat_usaha', 'id_rt', 'id_rw', 'kelurahan', 'kecamatan', 'upload_foto_usaha', 'deskripsi_usaha']; // Kolom yang dapat diisi

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id');
    }
>>>>>>> 66f38f93b658e50e53571f3a88e7d84a6595aa9a
}
