<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PinjamInventarisModel extends Model
{
    use HasFactory;

    public $table = 'pinjam_inventaris';
    public $primaryKey = 'pinjam_inventaris_id';
    protected $fillable = [
        'inventaris_id',
        'peminjam',
        'tanggal_pinjam',
        'tanggal_kembali',
    ];

    public function inventaris():BelongsTo
    {
        return $this->belongsTo(InventarisModel::class, 'inventaris_id','inventaris_id');
    }
}
