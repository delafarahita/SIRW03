<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisModel extends Model
{
    use HasFactory;

    public $table = 'inventaris';
    public $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama_barang',
        'jenis_barang',
        'jumlah_barang',
    ];
}
