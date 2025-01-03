<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url_site',
        'url_git',
        'image_visuel',
        'image_deco1',
        'image_deco2',
        'image_deco3',
        'image_deco4',
        'image_deco5',
        'status',
        'active'
    ];

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(Language::class, 'language_project');
    }
}
