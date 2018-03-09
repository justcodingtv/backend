<?php

namespace App\Models;

use App\Traits\UuidExtra;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use UuidExtra, Notifiable, Bannable, HasRoles, SoftDeletes;

    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'options', 'extra',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return mixed
     */
    public function getJWTIdentifier ()
    {
        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Livestreaming key relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function livestreamingKey ()
    {
        return $this->hasOne(LivestreamingKey::class);
    }

    /**
     * Projects relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects ()
    {
        return $this->hasMany(Project::class);
    }

    public function findOrFailUUID ($uuid)
    {
        return $this->where('uuid', $uuid)->firstOrFail();
    }
}
