<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class OriginLanguage extends Model
{
    protected $fillable = [
        'name',
    ];

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'language_origin', 'origin_language_id', 'language_id');
    }
}
