<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define offices array
        $offices = [
            [
                'name' => 'Head Office',
                'facility_id' => 101,
                'type' => 'Head Office',
            ],
            [
                'name' => 'Branch Office',
                'facility_id' => 102,
                'type' => 'Branch Office',
            ],
        ];

        // Create offices in database
        foreach ($offices as $office) {
            \App\Models\Office::create($office);
        }
    }
}
