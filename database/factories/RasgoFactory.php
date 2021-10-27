<?php

namespace Database\Factories;

use App\Models\Rasgo;
use Illuminate\Database\Eloquent\Factories\Factory;

class RasgoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rasgo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>'Extrovertido'
        ];
    }
}
