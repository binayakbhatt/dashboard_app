<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mo extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'set_id',
        'office_id',
        'bags_opening_balance',
        'bags_received',
        'bags_opened',
        'bags_closed',
        'bags_dispatched',
        'bags_transferred',
        'articles_received',
        'articles_closed',
        'articles_pending',
        'customs_examination',
        'customs_clearance',
        'customs_pending',
        'sa_WS',
        'mts_WS',
        'dwl_WS',
        'gds_WS',
        'manpower',
        'logbook',
        'rtn',
        'remarks',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'date' => 'date',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function set()
    {
        return $this->belongsTo(Set::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
