<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailService extends Model
{
    protected $fillable = [
        'name',
    ];

    public function ranking()
    {
        return $this->hasOne(Ranking::class);
    }
}
