<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LivestreamingKey extends Model
{
    /*
     * Auto creates a streaming key when a model is created.
     * Prevents key change.
     * */
    protected static function boot ()
    {
        parent::boot();

        $key = Crypt::encryptString(hash('sha256', time() . uniqid(true) . str_random(100)));

        static::creating(function ($model) use ($key) {
            $model->streaming_key = $key;
        });
    }

    public $incrementing = false;

    protected $fillable = ['active'];

    public function getStreamingKeyAttribute($value)
    {
        try {
            return Crypt::decryptString($value);
        } catch (DecryptException $e) {
            return 'error';
        }
    }

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}
