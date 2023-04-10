<?php

namespace Database\Seeders;

use App\Models\Rtn;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RtnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultRtns = Rtn::defaultRtns();

        foreach ($defaultRtns as $rtn) {
            Rtn::updateOrCreate(['name' => $rtn]);
        }
    }
}
