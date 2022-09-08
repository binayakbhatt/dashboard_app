<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aadhaar extends Model
{
    use HasFactory;

   protected $fillable =[
        'import_id',
        'division_id',
        'station_no',
        'centre_name',
        'pincode_id',
        'operator_name',
        'transaction_date',
        'centre_type',
        'enrolments',
        'updates',
    ];

    protected $casts =[
        'date' =>'date',
    ];

    public function import()
    {
        return $this->belongsTo(Import::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function pincode()
    {
        return $this->belongsTo(Pincode::class);
    }
}
