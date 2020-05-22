<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * Trait for applying UUIDs.
 */
trait UsesUuid
{
    /**
     * Hook into model's boot method
     */
    protected static function bootUsesUuid()
    {
        static::creating(function ($model) {
            if(!$model->getKey()) {
                $model->{ $model->getKeyName() } = Str::uuid();
            }
        });
    }

    /**
     * Tell Eloquent UUIDs can't auto increment
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Tell Eloquent UUIDs are string
     */
    public function getKeyType()
    {
        return 'string';
    }
}

?>