<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Turbine;
use App\Models\Component;
use App\Models\Inspection;

class InspectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * //@return void
     */
    public function run()
    {

        // Fetch all turbines
        $turbines = Turbine::with('components')->get();

        foreach ($turbines as $turbine) {

            //Creating 3 inspections per turbine here.
            for ($i = 1; $i <= 3; $i++) {
            
                $inspection = Inspection::create([
                    'turbine_id' => $turbine->id,
                    'title' => "Inspection Title for Turbine " . $turbine->id,
                    'notes' => "This inspection has been made on the " . now(),
                    'created_at' => now()->subDays(rand(1, 30)), // Randomize date within the last 30 days
                ]);

                // Attach components with random grades
                foreach ($turbine->components as $component) {
                    $inspection->components()->attach($component->id, [
                        'grade' => rand(1, 5), // Random grade between 1 (perfect) and 5 (broken)
                    ]);
                }

            }
        }
        
    }
    
}
