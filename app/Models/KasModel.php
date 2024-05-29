<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KasModel extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'id_rt',
        'keterangan',
        'tanggal',
        'pemasukan',
        'pengeluaran',
    ];

    public function rt(): BelongsTo
    {
        return $this->belongsTo(RtModel::class, 'id_rt', 'id');
    }
}
