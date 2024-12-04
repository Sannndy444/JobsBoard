<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'type',
    ];

    function location()
    {
        $this->hasMany(Location::class);
    }

    function company()
    {
        $this->hasMany(Company::class);
    }

    function application()
    {
        $this->hasMany(Application::class);
    }
}
