<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Get all users with role ids
        $users = \App\Models\User::all();

        // Loop through each user and assign the role
        foreach ($users as $user) {
            $user->roles()->attach($user->role_id);
        }

        \App\Models\Role::create([
            'name' => 'Aadhaar',
        ]);
    }
}
