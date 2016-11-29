<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{

    protected $fillable = [
        'id', 'verison', 'release_date', 'confirmed_real', 'confirmed_release_date'
    ];

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    public function versionVotes()
    {
        return $this->hasMany('App\VersionVote');
    }

    public function suggestedDates()
    {
        return $this->hasMany('App\SuggestedReleaseDate');
    }

    public function canLeaveReview()
    {
        return $this->confirmed_real and $this->isReleased();
    }

    public function isReleased()
    {
        $date_time = new Carbon();
        return $this->confirmed_release_date and $date_time->now() >= $this->release_date;
    }

    public function votedFor()
    {
        return $this->hasOne('App\VersionVote')->authored();
    }
}
