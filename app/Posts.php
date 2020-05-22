<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Posts extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo('App\Courses');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
