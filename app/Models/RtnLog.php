<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtnLog extends Model
{
    protected $table = 'rtn_logs';

    protected $fillable = [
        'rtn_id',
        'created_by',
        'recording_office_id',
        'arrived_at',
        'departed_at',
        'remarks',
    ];

    protected $casts = [
        'arrived_at' => 'datetime',
        'departed_at' => 'datetime',
    ];

    public function rtn()
    {
        return $this->belongsTo(Rtn::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function recordingOffice()
    {
        return $this->belongsTo(Office::class, 'recording_office_id');
    }

    public function bags()
    {
        return $this->hasMany(RtnBag::class);
    }
}
