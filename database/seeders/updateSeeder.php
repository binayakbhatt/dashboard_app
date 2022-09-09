<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class updateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::create([
            'name' => 'Aadhaar',
        ]);
    }
}
