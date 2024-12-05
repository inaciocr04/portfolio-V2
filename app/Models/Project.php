<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
