<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobAssignments extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'job_assignments')
                    ->withTimestamps()
                    ->withPivot('assigned_at');
    }
}
