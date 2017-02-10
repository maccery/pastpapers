<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Config;

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

    public function confirmedReal()
    {
        $this->confirmed_real = True;
        $this->save();
    }

    public function getPointsAttribute() {
        return $this->votes->sum('vote');
    }

    public function getPercentageCompleteAttribute() {
        $confirm_at = Config::get('crowd_sourced.confirm_at');
        $reject_at = Config::get('crowd_sourced.reject_at');

        // how close are we to either confirm or reject?
        ($this->points > 0) ? $decider = $confirm_at : $decider = $reject_at;

        return floor(100 * $this->points / $decider);
    }

    public function getRewardedForAttribute() {
        return 'Contribution';
    }
}