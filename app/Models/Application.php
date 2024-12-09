<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [
        'id',
    ];

    function work()
    {
        return $this->belongsTo(Works::class);
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
