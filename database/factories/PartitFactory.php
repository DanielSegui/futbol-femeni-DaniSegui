<?php

namespace Database\Factories;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartitFactory extends Factory
{
    protected $model = Partit::class;

    public function definition(): array
    {
        return [
            'local_id' => Equip::inRandomOrder()->first()->id,
            'visitante_id' => Equip::inRandomOrder()->first()->id,
            'estadi_id' => Estadi::inRandomOrder()->first()->id,
            'data' => Carbon::now()->addDays(rand(1, 60)),
            'jornada' => $this->faker->numberBetween(1, 38),
            'gols_local' => $this->faker->numberBetween(0, 5),
            'gols_visitant' => $this->faker->numberBetween(0, 5),
        ];
    }
}