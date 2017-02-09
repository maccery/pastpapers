<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestedReleaseDate extends Model
{
    protected $fillable = [
        'id', 'release_date', 'user_id', 'version_id'
    ];

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function votedFor()
    {
        return $this->hasOne('App\Vote')->authored('App\SuggestedReleaseDate');
    }

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

}
