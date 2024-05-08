<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteriaModel extends Model
{
    use HasFactory;

    public $table = 'data_kriteria';
    public $primaryKey = 'id_kriteria';

    public $fillable = ['kode_kriteria', 'nama_kriteria', 'bobot', 'jenis'];

    public $timestamps = false;

    public static $jenis =[
        "Benefit","Cost"
    ];
}
