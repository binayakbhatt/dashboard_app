<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define roles array
        $roles = [
            'Administrator',
            'Editor',
            'Verified',
            'Guest',
            'Byod',
        ];

        // Create roles in database
        foreach ($roles as $role) {
            $exists = \App\Models\Role::where('name', $role)->first();
            if (!$exists) {
                \App\Models\Role::create([
                    'name' => $role,
                ]);
            }
        }
    }
}
