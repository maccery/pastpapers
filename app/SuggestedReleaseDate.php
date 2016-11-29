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
        return $this->hasMany('App\SuggestedReleaseDateVote');
    }

    public function votedFor()
    {
        return $this->hasOne('App\SuggestedReleaseDateVote')->authored();
    }

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

}
