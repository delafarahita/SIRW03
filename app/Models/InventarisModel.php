<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InventarisModel extends Model
{
    use HasFactory;

    public $table = 'inventaris';
    public $primaryKey = 'inventaris_id';

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'status_barang',
    ];

    public function pinjamInventaris():HasMany
    {
        return $this->hasMany(PinjamInventarisModel::class);
    }
}
