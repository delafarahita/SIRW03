<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasModel extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $primaryKey = 'id';
}
