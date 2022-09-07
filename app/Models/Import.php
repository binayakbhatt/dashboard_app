<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'file_path',
    ];

    public function aadhaars()
    {
        return $this->hasMany(Aadhaar::class);
    }
}
