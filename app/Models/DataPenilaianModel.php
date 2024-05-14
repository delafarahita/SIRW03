<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataPenilaianModel extends Model
{
    use HasFactory;

    protected $table = 'data_penilaian';

    protected $primaryKey = 'id_penilaian';

    public $timestamps = false;

    protected $fillable = ['id_alternatif', 'id_kriteria', 'nilai'];
    
    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(DataAlternatifModel::class, 'id_alternatif', 'id_alternatif');
    }
    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(DataKriteriaModel::class, 'id_kriteria', 'id_kriteria');
    }

    public function nilai_for($kriteria_id)
    {
        $penilaian = $this->where('id_kriteria', $kriteria_id)->first();
        return $penilaian ? $penilaian->nilai : null;
    }
}
