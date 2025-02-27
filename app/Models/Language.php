<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Language extends Model
{

    protected $fillable = [
        'name',
        'logo_language',
        'language_type_id',
    ];
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'language_project');
    }
    public function originLanguages(): BelongsToMany
    {
        return $this->belongsToMany(OriginLanguage::class, 'language_origin', 'language_id', 'origin_language_id');
    }

    public function languageType(): BelongsTo
    {
        return $this->belongsTo(LanguageType::class, 'language_type_id');
    }
}
