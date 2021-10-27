<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generador extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'birthday', 'adress', 'email', 'phone',
     'imagen', 'secundario', 'orientacion', 'fecha_inicio_secundario', 
     'fecha_fin_secundario', 'objetivo_profesional', 'datos_interes'];

    public function empresas()
    {
        return $this->hasMany(Empresas::class);
    }
    public function lenguajes()
    {
        return $this->hasMany(Lenguaje::class);
    }
    public function rasgos()
    {
        return $this->hasMany(Rasgo::class);
    }
}
