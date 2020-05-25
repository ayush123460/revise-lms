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
        return $this->hasOne('App\Syllabus', 'course_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Posts', 'course_id', 'id');
    }

    public function material()
    {
        return $this->hasMany('App\Material', 'course_id', 'id');
    }
}
