<?php

namespace Database\Seeders;

use App\Models\Partit;
use App\Models\Equip;
use App\Models\Estadi;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PartitsSeeder extends Seeder
{
    public function run(): void
    {
        $equips = Equip::all();
        $estadis = Estadi::all();

        // Calendario simple: cada equipo juega contra todos
        foreach ($equips as $local) {
            foreach ($equips as $visitant) {
                if ($local->id === $visitant->id) continue;

                Partit::factory()->create([
                    'local_id' => $local->id,
                    'visitante_id' => $visitant->id,
                    'estadi_id' => $estadis->random()->id,
                    'data' => Carbon::now()->addDays(rand(1, 60)),
                ]);
            }
        }
    }
}