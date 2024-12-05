<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';

    protected $fillable = [
        'name',
        'description',
    ];

    function works()
    {
        $this->belongsTo(Works::class);
    }
}
