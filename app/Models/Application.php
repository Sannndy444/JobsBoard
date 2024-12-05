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
        $this->belongsTo(Works::class);
    }

    function user()
    {
        $this->belongsTo(User::class);
    }
}
