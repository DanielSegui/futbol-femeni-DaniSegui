<?php

namespace Database\Factories;

use App\Models\Equip;
use App\Models\Estadi;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipFactory extends Factory
{
    protected $model = Equip::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->company(),
            'estadi_id' => Estadi::inRandomOrder()->first()->id,
            'titols' => $this->faker->numberBetween(0,5),
        ];
    }
}
