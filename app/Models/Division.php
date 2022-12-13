<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
    ];

    public function aadhaars()
    {
        return $this->hasMany(Aadhaar::class);
    }

    public function pincodes()
    {
        return $this->hasMany(Pincode::class);
    }

    public function offices()
    {
        return $this->hasMany(Office::class);
    }
}
