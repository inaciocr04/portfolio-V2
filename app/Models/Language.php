<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'language_project');
    }
    public function originLanguages(): BelongsToMany
    {
        return $this->belongsToMany(OriginLanguage::class, 'language_origin', 'language_id', 'origin_language_id');
    }
}
