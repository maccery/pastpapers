<?php

namespace App;

trait Votable
{
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
}