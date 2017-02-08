<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;

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

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function votedFor()
    {
        return $this->hasOne('App\Vote')->authored();
    }
}
