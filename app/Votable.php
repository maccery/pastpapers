<?php

namespace App;

trait Votable
{
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public function votedFor()
    {
        return $this->hasOne('App\Vote', 'votable_id')->authored(get_class($this));
    }
}