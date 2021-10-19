<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    protected $fillable=['company_name','charge','start_date','end_date','generador_id'];

    use HasFactory;

    public function generador()
    {
        return $this->belongsTo(Generador::class);
    }
}
