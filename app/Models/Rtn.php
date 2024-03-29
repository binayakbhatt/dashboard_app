<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rtn extends Model
{
    protected $fillable = [
        'name'
    ];

    public static function defaultRtns()
    {
        return [
            'Itanagar Line',
            'Tinsukia Line',
            'Silchar Line',
            'Dimapur Line',
            'Tura Line',
        ];
    }

    public function logs()
    {
        return $this->hasMany(RtnLog::class);
    }

    public function offices()
    {
        return $this->belongsToMany(Office::class);
    }
}   
