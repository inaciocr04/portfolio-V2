<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
