<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use App\Traits\UuidExtra;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Project extends Model
{
    use UuidExtra, SoftDeletes;

    protected $fillable = ['title', 'description', 'extra', 'active', 'private'];

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
        return $this->belongsToMany(Language::class, 'project_has_language');
    }
}
