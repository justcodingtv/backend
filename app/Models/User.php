<?php

namespace App\Models;

use Spatie\BinaryUuid\HasBinaryUuid;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, Bannable, HasRoles, HasBinaryUuid, SoftDeletes;

    protected $fillable = [
        'username', 'first_name', 'last_name', 'email', 'password', 'options', 'extra',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier ()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function livestreamingKey ()
    {
        return $this->hasMany(LivestreamingKey::class);
    }
}
