<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\BinaryUuid\HasBinaryUuid;

class Image extends Model
{
    use HasBinaryUuid;

    protected $fillable = ['path'];
}
