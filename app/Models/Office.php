<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'facility_id',
        'type',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
