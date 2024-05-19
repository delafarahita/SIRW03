<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriUmkmModel extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'umkm';
    public $primaryKey = 'id_usaha';
    public $timestamps = false;
    protected $fillable = [
        'id_usaha',
        'nama_usaha',
    ];

    public function penduduk(): HasMany
    {
        return $this->hasMany(DataPendudukModel::class, 'id_usaha', 'id_usaha');
    }
}
