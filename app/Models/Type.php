<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = ['id'];

    function works()
    {
        $this->hasMany(Works::class);
    }
}
