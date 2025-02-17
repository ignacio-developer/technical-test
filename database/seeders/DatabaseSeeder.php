<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\TurbineSeeder;
use Database\Seeders\ComponentSeeder;
use Database\Seeders\InspectionSeeder;

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
        $this->call([
            TurbineSeeder::class,
            ComponentSeeder::class,
            InspectionSeeder::class,
        ]);
    }
}
