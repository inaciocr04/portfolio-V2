<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image_visuel',
        'image_deco1',
        'image_deco2',
        'image_deco3',
        'image_deco4',
        'image_deco5',
    ];

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_project');
    }
}
