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
            '*.last_update_date*' => 'required|date',
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
            $pincode = substr($row['centre_summary'], -6);

            // Start a try catch block to check pincode and division
            try {
                // get the division id from the pincode
                $division_id = \App\Models\Pincode::where('pincode', $pincode)->firstOrFail()->division_id;
            } catch (\Exception $e) {

            }
        }
    }
}
