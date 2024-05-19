<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatifModel extends Model
{

    use HasFactory;

    public $table = 'data_alternatif';
    public $primaryKey = 'id_alternatif';
    
    public $timestamps = false;
    public $fillable = ['nama_alternatif'];

    public function kriterias()
    {
        return $this->belongsToMany(DataKriteriaModel::class, 'data_penilaian')
                    ->withPivot('nilai');
    }

    public function penilaians()
    {
        return $this->hasMany(DataPenilaianModel::class, 'id_alternatif');
    }
}
