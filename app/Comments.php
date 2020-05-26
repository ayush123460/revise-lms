<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Comments extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo('App\Posts', 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
