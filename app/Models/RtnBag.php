<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RtnBag extends Model
{
    protected $table = 'rtn_bags';

    protected $fillable = [
        'rtn_log_id',
        'office_id',
        'bags_dispatched',
        'bags_left',
    ];

    public function rtnLog()
    {
        return $this->belongsTo(RtnLog::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
