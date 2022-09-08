<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    protected $fillable = [
        'file_name',
        'file_path',
        'is_imported',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_imported' => 'boolean',
    ];

    public function aadhaars()
    {
        return $this->hasMany(Aadhaar::class);
    }
}
