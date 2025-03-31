<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generador extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'surname', 'birthday', 'adress', 'email', 'phone',
     'imagen', 'secundario', 'orientacion','terciaria','orientacion_terciaria', 'fecha_inicio_secundario', 'fecha_inicio_terciaria', 
     'fecha_fin_secundario', 'fecha_fin_terciaria', 'objetivo_profesional'];

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

    public function toArray()
    {
        $array = parent::toArray();
        $array['empresas'] = $this->empresas->toArray();
        $array['lenguajes'] = $this->lenguajes->toArray();
        $array['rasgos'] = $this->rasgos->toArray();
        $array['otros_estudios'] = $this->otros_estudios->toArray();
        
        // Ensure all fillable attributes are included
        foreach ($this->fillable as $attribute) {
            if (!isset($array[$attribute])) {
                $array[$attribute] = $this->$attribute;
            }
        }
        
        return $array;
    }
}
