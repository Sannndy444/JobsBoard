<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    protected $table = 'types';

    protected $guarded = ['id'];

    function works()
    {
        return $this->hasMany(Works::class);
    }
}
