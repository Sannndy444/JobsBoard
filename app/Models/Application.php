<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'resume',
        'cover_letter',
        'status'
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
