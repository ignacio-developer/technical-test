<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turbine;
use App\Models\Component;


class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turbines = Turbine::all();

        foreach($turbines as $turbine) {

            Component::create([
                'turbine_id' => $turbine->id,
                'name' => 'Blade',
            ]);
            Component::create([
                'turbine_id' => $turbine->id,
                'name' => 'Rotor',
            ]);
            Component::create([
                'turbine_id' => $turbine->id,
                'name' => 'Hub',
            ]);
            Component::create([
                'turbine_id' => $turbine->id,
                'name' => 'Generator',
            ]);

        }
    }
}
