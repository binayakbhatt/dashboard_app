<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Users using factory
        \App\Models\User::factory(1)->create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'employee_id' => 'ADMIN',
            'designation' => 'Administrator',
            'is_active' => True,
            'role_id' => 1,
            'office_id' => 1,
        ]);
    }
}
