<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = [
        'name',
        'description',
    ];

    function works()
    {
        return $this->hasMany(Works::class, 'work_id');
    }
}
