<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'language_project');
    }
    public function origineLanguages()
    {
        return $this->belongsToMany(OriginLanguage::class);
    }
}
