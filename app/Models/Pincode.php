<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    protected $fillable = [
        'division_id',
        'pincode',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
