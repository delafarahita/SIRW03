<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    public $table = 'keluhans';

    public $primaryKey = 'id';
    protected $fillable = ['id', 'nama_penduduk', 'rt', 'keluhan'];
}
