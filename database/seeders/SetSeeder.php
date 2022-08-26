<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define sets array
        $sets = [
            'GEN 1',
            'GEN 2',
            'GEN 3',
            'GEN 4',
            'GEN 5',
            'GEN 6',
            'GEN 7',
            'GEN 8',
        ];

        // Loop through sets array and create sets
        foreach ($sets as $set) {
            \App\Models\Set::create([
                'name' => $set,
            ]);
        }
    }
}
