<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Speed Post',
            'Registered Post',
            'Aadhaar',
            'PMA',
            'POSB',
            'Marketing Executive',
        ];

        foreach ($services as $service) {
            \App\Models\MailService::create([
                'name' => $service,
            ]);
        }
    }
}
