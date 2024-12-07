<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    protected $table = 'work';

    protected $guarded = [
        'id',
    ];

    function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    function type()
    {
        return $this->belongsTo(Types::class,'type_id');
    }
}
