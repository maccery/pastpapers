<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Votable extends Model
{
    use SoftDeletes;

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function votedFor()
    {
        return $this->hasOne('App\Vote', 'votable_id')->authored(get_class($this));
    }

    public function getPointsAttribute() {
        return $this->votes->sum('vote');
    }
}