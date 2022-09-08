<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;


class AadhaarsImport implements ToCollection, WithHeadingRow, WithValidation
{
    use Importable;

    // set the import id
    public function __construct($import_id)
    {
        $this->import_id = $import_id;
    }

    public function rules(): array
    {
        return [
            '*.station_id' => 'required|string',
            '*.centre_summary' => 'required|string',
            '*.contact_person' => 'required|string',
            '*.last_update_date_ddmmyyyy' => 'required|date_format:d/m/Y',
            '*.centre_type' => 'required|string',
            '*.total_enrolments_on_last_day' => 'required|integer',
            '*.total_updates_on_last_day' => 'required|integer',
        ];
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // get pincode from the centre_summary, which is in the last six characters
            $pin_str = substr($row['centre_summary'], -6);

            $division = null;
            $pincode = null;

            // Start a try catch block to check pincode and division
            try {
                // set the pincode model
                $pincode = \App\Models\Pincode::where('pincode', $pin_str)->firstOrFail();
                // set the division model
                $division = \App\Models\Division::where('id', $pincode->division_id)->firstOrFail();
            } catch (\Exception $e) {
                //  Throw an error if pincode is not found
                throw new \Exception('Pincode not found for ' . $row['centre_summary']);
            }

            // Remove ' from the centre name and trim the string and set it as station_no
            $station_no = trim(str_replace("'", '', $row['centre_summary']));

            // Check if the station_no with the same transaction date already exists
            $aadhaar = \App\Models\Aadhaar::where('station_no', $station_no)
                ->where('transaction_date', $row['last_update_date_ddmmyyyy'])
                ->exists();
            
            // If the station_no with the same transaction date already exists, then skip the row
            if ($aadhaar) {
                continue;
            }

            // create the aadhaar model
            \App\Models\Aadhaar::create([
                'import_id' => $this->import_id,
                'division_id' => $division->id,
                'station_no' => $station_no,
                'centre_name' => $row['centre_summary'],
                'operator_name' => $row['contact_person'],
                'transaction_date' => $row['last_update_date_ddmmyyyy'],
                'centre_type' => $row['centre_type'],
                'enrolments' => $row['total_enrolments_on_last_day'],
                'updates' => $row['total_updates_on_last_day'],
            ]);
        }
    }
}
