<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatifModel extends Model
{
    use HasFactory;

    public $table = 'data_alternatif';
    public $primaryKey = 'id_alternatif';
    
    public $fillable = ['nama_alternatif'];
    
}
