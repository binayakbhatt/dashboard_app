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
            'Tinsukia','Sivasagar','Guwahati','RMS Silchar','Nalbari','Dibrugarh','Darrang','Goalpara','Nagaon','Cachar'
        ];

        // Loop through divisions array
        foreach ($divisions as $division) {
            // Create division
            \App\Models\Division::create([
                'name' => $division,
            ]);
        }
    }
}
