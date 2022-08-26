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
                'name' => 'NSH',
                'facility_id' => 101,
                'office_type_id' => 1,
            ],
            [
                'name' => 'ICH',
                'facility_id' => 102,
                'office_type_id' => 2,
            ],
        ];

        // Create offices in database
        foreach ($offices as $office) {
            \App\Models\Office::create($office);
        }
    }
}
