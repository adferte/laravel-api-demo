<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    public static function boot(): void
    {
        parent::boot();
        static::creating(function (Model $model) {
            $model->setAttribute($model->getKeyName(), Uuid::uuid4());
        });
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function getIncrementing()
    {
        return false;
    }

}
