<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OriginLanguage extends Model
{
    protected $fillable = [
        'name',
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
