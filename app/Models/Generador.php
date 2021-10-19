<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generador extends Model
{
    use HasFactory;
    protected $fillable=['name','surname','birthday','adress','email','phone','imagen'];


    public function empresas()
    {
        return $this->hasMany(Empresas::class);
    }

}
