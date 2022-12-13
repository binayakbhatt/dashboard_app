<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define divisions array
        $divisions = [
            'Tinsukia', 'Sivasagar', 'Guwahati', 'RMS Silchar', 'Nalbari', 'Dibrugarh', 'Darrang', 'Goalpara', 'Nagaon', 'Cachar', 'RMS GH'
        ];

        // Loop through divisions array
        foreach ($divisions as $division) {
            // Check if division exists
            $exists = \App\Models\Division::where('name', $division)->first();
            if (!$exists) {
                // Create division
                \App\Models\Division::create([
                    'name' => $division,
                ]);
            }
        }
    }
}
