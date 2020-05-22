<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Syllabus extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo('App\Courses');
    }

    public function chapters()
    {
        return $this->hasMany('App\Chapters');
    }
}
