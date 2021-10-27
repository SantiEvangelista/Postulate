<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otros_estudios extends Model
{
    protected $fillable=['nombre','generador_id'];

    use HasFactory;
}
