<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    protected $fillable = ['user_id', 'keluhan', 'is_private', 'reply'];
}
