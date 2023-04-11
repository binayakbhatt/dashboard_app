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
        'division_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function officeType(){
        return $this->belongsTo(OfficeType::class);
    }

    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function rtns()
    {
        return $this->belongsToMany(Rtn::class);
    }
}
