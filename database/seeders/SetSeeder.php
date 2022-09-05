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
            'Morning',
            'Day',
            'Evening',
            'Night A',
            'Night B',
        ];

        // Loop through sets array and create sets
        foreach ($sets as $set) {
            \App\Models\Set::create([
                'name' => $set,
            ]);
        }
    }
}
