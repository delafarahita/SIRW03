<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RTModel extends Model
{
    use HasFactory;
    public $table = 'rt';
    public $primaryKey = 'id_rt';
    public $timestamps = false;
    protected $fillable = [
        'id_rt',
        'nama_rt',
    ];

    public function penduduk(): HasMany
    {
        return $this->hasMany(DataPendudukModel::class, 'id_rt', 'id_rt');
    }
}
