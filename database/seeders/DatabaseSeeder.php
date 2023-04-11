<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OfficeTypeSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SetSeeder::class);
        $this->call(PincodeSeeder::class);
        $this->call(RtnSeeder::class);
    }
}
