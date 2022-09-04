<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aadhaar extends Model
{
    use HasFactory;

   protected $fillable =[
        'station_id',
        'centre_name',
        'division',
        'operator',
        'date',
        'centre_type',
        'enrolment',
        'update',
    ];

    protected $casts =[
        'date' =>'date',
    ];
}
