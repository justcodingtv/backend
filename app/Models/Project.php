<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Project extends Model
{
    use UuidModelTrait, SoftDeletes, Cachable;

    public $incrementing = false;

    protected $fillable = ['title', 'description', 'extra', 'active', 'private'];

    /**
     * @return string
     */
    public function getKey ()
    {
        return 'uuid';
    }

    /**
     * User relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function projects ()
    {
        return $this->belongsToMany(Project::class, 'project_has_language');
    }
}
