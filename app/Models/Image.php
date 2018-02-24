<?php

namespace App\Models;

use Alsofronie\Uuid\UuidModelTrait;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Image extends Model
{
    use UuidModelTrait, Cachable;

    protected $fillable = ['path'];
}
