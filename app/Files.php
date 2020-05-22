<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Files extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function materials()
    {
        return $this->hasMany('App\Materials');
    }
}
