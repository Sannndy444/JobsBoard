<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $guarded = [
        'id',
    ];

    function location()
    {
        $this->belongsTo(Location::class);
    }

    function company()
    {
        $this->belongsTo(Company::class);
    }

    function application()
    {
        $this->hasMany(Application::class);
    }

    function type()
    {
        $this->belongsTo(Type::class);
    }
}
