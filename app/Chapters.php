<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Chapters extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function syllabus()
    {
        return $this->belongsTo('App\Syllabus');
    }
}
