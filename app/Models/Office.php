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
        'office_type_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function officeType(){
        return $this->belongsTo(OfficeType::class);
    }
}
