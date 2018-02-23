<?php

namespace App\Models;

use Spatie\BinaryUuid\HasBinaryUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes, HasBinaryUuid;

    public $incrementing = false;

    protected $fillable = ['body', 'streamer_id', 'extra'];

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function streamer ()
    {
        return $this->belongsTo(User::class, 'streamer_id', 'id');
    }
}
