<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmkmModel extends Model
{
    use HasFactory;

    protected $table = 'umkms'; // Nama tabel di database
    protected $fillable = ['nama', 'deskripsi', 'alamat']; // Kolom yang dapat diisi
}
