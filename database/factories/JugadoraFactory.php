<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Equip;
use Carbon\Carbon;

class JugadoraFactory extends Factory
{
    protected $model = \App\Models\Jugadora::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'equip_id' => Equip::inRandomOrder()->first()->id, // asigna aleatoriamente a un equipo existente
            'data_naixement' => $this->faker->dateTimeBetween('-30 years', '-16 years')->format('Y-m-d'),
            'dorsal' => $this->faker->numberBetween(1, 30),
            'foto' => null,
            'gols' => $this->faker->numberBetween(0, 50),
            'posicio' => $this->faker->randomElement(['Portera', 'Defensa', 'Centrocampista', 'Delantera']),
        ];
    }
}