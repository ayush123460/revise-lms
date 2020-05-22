<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Courses extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function syllabus()
    {
        return $this->hasOne('App\Syllabus');
    }

    public function posts()
    {
        return $this->hasMany('App\Posts');
    }

    public function material()
    {
        return $this->hasMany('App\Material');
    }
}
