<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define offices array
        $offices = [
            [
                'name' => 'Guwahati CO',
                'facility_id' => 'CO1200000000',
                'office_type_id' => 10,
            ],
            [
                'name' => 'Guwahati NSH',
                'facility_id' => 'SP12250000650',
                'office_type_id' => 1,
            ],
            [
                'name' => 'Guwahati PH',
                'facility_id' => 'PH12250000761',
                'office_type_id' => 5,
            ],
            [
                'name' => 'Guwahati SFPO',
                'facility_id' => 'FP12270000000',
                'office_type_id' => 8,
            ],
            [
                'name' => 'Guwahati BNPL',
                'facility_id' => 'BN12250000650',
                'office_type_id' => 6,
            ],
            [
                'name' => 'Guwahati CRC',
                'facility_id' => 'MO12250000553',
                'office_type_id' => 3,
            ],
            [
                'name' => 'Guwahati Letter',
                'facility_id' => 'MO12250000551',
                'office_type_id' => 4,
            ],
            [
                'name' => 'Guwahati MBC',
                'facility_id' => 'PC12250000650',
                'office_type_id' => 9,
            ],
            [
                'name' => 'LGBI TMO',
                'facility_id' => 'TM12250000503',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Kamakhya TMO',
                'facility_id' => '0',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Guwahati TMO',
                'facility_id' => 'TM12250000501',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Shillong Letter',
                'facility_id' => 'MO12250000558',
                'office_type_id' => 4,
            ],
            [
                'name' => 'Shillong CRC',
                'facility_id' => 'MO12250000561',
                'office_type_id' => 3,
            ],
            [
                'name' => 'Shillong PH',
                'facility_id' => 'PH12250000765',
                'office_type_id' => 5,
            ],
            [
                'name' => 'Shillong SPPH',
                'facility_id' => '0',
                'office_type_id' => 5,
            ],
            [
                'name' => 'Shillong TMO',
                'facility_id' => 'TM12250000506',
                'office_type_id' => 7,
            ],
            [
                'name' => 'New Bongaigaon Letter',
                'facility_id' => 'MO12250000566',
                'office_type_id' => 4,
            ],
            [
                'name' => 'New Bongaigaon CRC',
                'facility_id' => 'MO12250000564',
                'office_type_id' => 3,
            ],
            [
                'name' => 'New Bongaigaon TMO',
                'facility_id' => 'TM12250000508',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Rangia Letter',
                'facility_id' => 'MO12250000562',
                'office_type_id' => 4,
            ],
            [
                'name' => 'Rangia CRC',
                'facility_id' => 'MO12250000559',
                'office_type_id' => 3,
            ],
            [
                'name' => 'Rangia TMO',
                'facility_id' => 'TM12250000504',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Tezpur Letter',
                'facility_id' => 'MO12250000557',
                'office_type_id' => 4,
            ],
            [
                'name' => 'Tezpur CRC',
                'facility_id' => 'MO12250000560',
                'office_type_id' => 3,
            ],
            [
                'name' => 'Tezpur TMO',
                'facility_id' => 'TM12250000507',
                'office_type_id' => 7,
            ],
            [
                'name' => 'Tezpur PH',
                'facility_id' => 'PH12250000764',
                'office_type_id' => 5,
            ],
            [
                'name' => 'N Lakhimpur Letter',
                'facility_id' => 'MO12250000567',
                'office_type_id' => 4,
            ],
            [
                'name' => 'N Lakhimpur CRC',
                'facility_id' => 'MO12250000565',
                'office_type_id' => 3,
            ],
            [
                'name' => 'N Lakhimpur TMO',
                'facility_id' => 'TM12250000505',
                'office_type_id' => 7,
            ],
            [
                'name' => 'N Lakhimpur PH',
                'facility_id' => 'PH12250000527',
                'office_type_id' => 5,
            ],
        ];

        // Create offices in database
        foreach ($offices as $office) {
            \App\Models\Office::updateOrCreate(
                ['facility_id' => $office['facility_id']],
                $office
            );
        }
    }
}
