<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LanguageType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function languages(): HasMany
    {
        return $this->hasMany(Language::class);
    }
}
