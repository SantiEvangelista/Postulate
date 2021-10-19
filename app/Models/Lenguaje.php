<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lenguaje extends Model
{
    protected $fillable=['nombre','generador_id'];

    use HasFactory;

    public function generador()
    {
        return $this->belongsTo(Generador::class);
    }
}
