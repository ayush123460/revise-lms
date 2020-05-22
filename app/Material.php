<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Material extends Model
{
    use UsesUuid;

    protected $guarded = [];

    public function file()
    {
        return $this->belongsTo('App\Files');
    }

    public function course()
    {
        return $this->belongsTo('App\Courses');
    }
}
