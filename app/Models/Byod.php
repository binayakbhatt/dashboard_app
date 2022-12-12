<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Byod extends Model
{
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'make_model',
        'imei',
        'post_office',
        'date_of_purchase',
        'date_of_acceptance',
        'division_id',
        'employee_id',
        'created_by',
    ];

    protected $casts = [
        'date_of_purchase' => 'date',
        'date_of_acceptance' => 'date',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
