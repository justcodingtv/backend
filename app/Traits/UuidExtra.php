<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidExtra
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid5(Uuid::NAMESPACE_DNS, uniqid(true) . time() . str_random(50));
        });
    }
}