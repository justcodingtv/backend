<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Language extends Model
{
    use Cachable;

    public $incrementing = false;

    protected $fillable = ['title', 'description', 'image_id'];

    /**
     * @return string
     */
    public function getKey ()
    {
        return 'uuid';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects ()
    {
        return $this->belongsToMany(Project::class, 'project_has_language');
    }
}
