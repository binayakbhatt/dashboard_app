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
            'employee_id' => 00010,
            'designation' => 'Administrator',
            'role_id' => 1,
            'office_id' => 1,
        ]);

        $admin_user = \App\Models\User::where('email', 'admin@test.com')->first();
        $admin_role = \App\Models\Role::where('name', 'Administrator')->first();

        $admin_user->roles()->attach($admin_role);
    }
}
