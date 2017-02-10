<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Votable
{

    protected $fillable = [
        'description',
        'user_id',
        'version_id',
        'software_id',
        'title',
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

}
