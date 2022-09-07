<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PincodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Array of pincode with division name
        $pincodes = [
            '784028' => 'Darrang',
            '785602' => 'Sivasagar',
            '786150' => 'Tinsukia',
            '783301' => 'Goalpara',
            '786001' => 'Dibrugarh',
            '786171' => 'Tinsukia',
            '783334' => 'Goalpara',
            '781001' => 'Guwahati',
            '781014' => 'Guwahati',
            '786601' => 'Tinsukia',
            '788806' => 'Cachar',
            '782003' => 'Nagaon',
            '788710' => 'Cachar',
            '784115' => 'Darrang',
            '786182' => 'Tinsukia',
            '781011' => 'Guwahati',
            '784125' => 'Darrang',
            '786012' => 'Dibrugarh',
            '782001' => 'Nagaon',
            '781127' => 'Guwahati',
            '786610' => 'Dibrugarh',
            '785685' => 'Sivasagar',
            '781020' => 'Guwahati',
            '787001' => 'Dibrugarh',
            '781012' => 'Guwahati',
            '786623' => 'Dibrugarh',
            '782125' => 'Nagaon',
            '786155' => 'Tinsukia',
            '785601' => 'Sivasagar',
            '781003' => 'Guwahati',
            '784505' => 'Darrang',
            '781304' => 'Nalbari',
            '785702' => 'Sivasagar',
            '781123' => 'Guwahati',
            '786157' => 'Tinsukia',
            '786004' => 'Dibrugarh',
            '786602' => 'Dibrugarh',
            '788011' => 'Cachar',
            '785697' => 'Sivasagar',
            '786156' => 'Tinsukia',
            '786125' => 'Tinsukia',
            '784509' => 'Darrang',
            '786613' => 'Dibrugarh',
            '784116' => 'Darrang',
            '783126' => 'Goalpara',
            '782446' => 'Nagaon',
            '786170' => 'Tinsukia',
            '782103' => 'Nagaon',
            '786151' => 'Tinsukia',
            '788098' => 'Cachar',
            '783132' => 'Goalpara',
            '787059' => 'Dibrugarh',
            '781007' => 'Guwahati',
            '782460' => 'Nagaon',
            '788001' => 'Cachar',
            '782124' => 'Nagaon',
            '781303' => 'Nalbari',
            '781126' => 'Nalbari',
            '783370' => 'Goalpara',
            '782447' => 'Nagaon',
            '781315' => 'Nalbari',
            '781301' => 'Nalbari',
            '785112' => 'Sivasagar',
            '781352' => 'Nalbari',
            '781372' => 'Nalbari',
            '781367' => 'Nalbari',
            '785006' => 'Sivasagar',
            '785618' => 'Sivasagar',
            '785670' => 'Sivasagar',
            '788001' => 'RMS Silchar',
            '787060' => 'Dibrugarh',
            '781321' => 'Nalbari',
            '785106' => 'Sivasagar',
            '786184' => 'Dibrugarh',
            '785001' => 'Sivasagar',
            '781335' => 'Nalbari',
            '785621' => 'Sivasagar',
            '786181' => 'Tinsukia',
            '784001' => 'Darrang',
            '781312' => 'Nalbari',
            '781349' => 'Nalbari',
            '781339' => 'Nalbari',
            '785634' => 'Sivasagar',
            '786152' => 'Tinsukia',
            '783337' => 'Goalpara',
            '785008' => 'Sivasagar',
            '785640' => 'Sivasagar',
            '786183' => 'Tinsukia',
            '785013' => 'Sivasagar',
            '783390' => 'Goalpara',
            '785630' => 'Sivasagar',
            '785104' => 'Sivasagar',
            '782141' => 'Nagaon',
            '785101' => 'Sivasagar',
            '781366' => 'Guwahati',
            '781380' => 'Guwahati',
            '788003' => 'Cachar',
            '781122' => 'Guwahati',
            '783330' => 'Goalpara',
            '783124' => 'Goalpara',
            '781039' => 'Guwahati',
            '781316' => 'Nalbari',
            '783129' => 'Goalpara',
            '785614' => 'Sivasagar',
            '783380' => 'Goalpara',
            '783101' => 'Goalpara',
            '786003' => 'Dibrugarh',
            '785690' => 'Sivasagar',
            '782105' => 'Nagaon',
            '788002' => 'Cachar',
            '788030' => 'Cachar',
            '784110' => 'Darrang',
            '784175' => 'Darrang',
        ];

        // Loop through the array and insert the data
        foreach ($pincodes as $pincode => $division) {
            $division_id = DB::table('divisions')->where('name', $division)->first()->id;
            DB::table('pincodes')->insert([
                'pincode' => $pincode,
                'division_id' => $division_id,
            ]);
        }
    }
}
