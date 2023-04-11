<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define office types
        $officeTypes = [
            'NSH',
            'ICH',
            'CRC',
            'Letter',
            'PH',
            'BNPL',
            'TMO',
            'SFPO',
            'MBC',
            'CO',
        ];

        // Loop through office types and create them
        foreach ($officeTypes as $officeType) {
            \App\Models\OfficeType::updateOrCreate([
                'name' => $officeType,
            ]);
        }
    }
}
