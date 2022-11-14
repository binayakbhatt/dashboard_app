<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    protected $fillable = [
        'mail_service_id',
        'first_place',
        'second_place',
        'third_place',
        'image_path_first',
        'image_path_second',
        'image_path_third',
    ];
}
