<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidAsKey
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid5(Uuid::NAMESPACE_DNS, uniqid(true) . str_random(50));
        });
    }
}