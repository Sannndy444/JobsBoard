<?php

namespace App\Models;
use App\Enums\Status;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'status' => Status::class,
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
