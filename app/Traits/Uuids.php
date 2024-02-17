<?php

namespace App\Traits;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

trait Uuids
{
    /**
     * Boot function from Laravel.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (Schema::hasColumn($model->getTable(), 'uuid') && empty($model->uuid)) {
                $model->uuid = Str::orderedUuid()->toString();
            }
        });
        static::saving(function ($model) {
            if (Schema::hasColumn($model->getTable(), 'uuid') && empty($model->uuid)) {
                $model->uuid = Str::orderedUuid()->toString();
            }
        });
    }
}
