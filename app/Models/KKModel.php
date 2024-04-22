<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KKModel extends Model
{
    use HasFactory;
    public $table = 'kk';
    public $primaryKey = 'no_kk';
    public $timestamps = false;
    protected $fillable = [
        'no_kk',
        'kepala_keluarga',
    ];

    public function penduduk(): HasMany
    {
        return $this->hasMany(DataPendudukModel::class, 'no_kk', 'no_kk');
    }
}
