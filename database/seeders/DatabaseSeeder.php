<?php

namespace Database\Seeders;

use App\Models\Lenguaje;
use App\Models\Rasgo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Rasgo::factory()->create();
        Rasgo::factory(['nombre'=>'Introvertido'])->create();
        Rasgo::factory(['nombre'=>'Amable'])->create();
        Rasgo::factory(['nombre'=>'Sensible'])->create();
        Rasgo::factory(['nombre'=>'Amistoso'])->create();
        Rasgo::factory(['nombre'=>'Inteligente'])->create();

        
        //Introvertido
        //Amable
        //Sensible
        //Amistoso
        //Inteligente

        Lenguaje::factory()->create();
        Lenguaje::factory(['nombre'=>'Español'])->create();
        Lenguaje::factory(['nombre'=>'Portuges'])->create();
        Lenguaje::factory(['nombre'=>'Frances'])->create();
        Lenguaje::factory(['nombre'=>'Chino'])->create();
        Lenguaje::factory(['nombre'=>'Aleman'])->create();

        //Español
        //Portuges
        //Frances
        //Chino
        //Aleman
    }
}
