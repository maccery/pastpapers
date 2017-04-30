<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class PastPaper extends Votable
{

    protected $fillable = [
        'id',
        'past_paper',
        'release_date',
        'confirmed_real',
        'confirmed_release_date',
        'subject_id',
        'user_id',
        'url',
    ];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function paper_questions()
    {
        return $this->hasMany('App\PaperQuestion');
    }

    public function suggestedDates()
    {
        return $this->hasMany('App\SuggestedReleaseDate');
    }

    public function isReleased()
    {
        $date_time = new Carbon();
        return $this->confirmed_release_date and $date_time->now() >= $this->release_date;
    }


    public function getRouteAttribute(){
        return route('browse_by_past_paper', ['subject' => $this->subject, 'past_paper' => $this]);
    }

    public function getFullNameAttribute() {
        return $this->past_paper;
    }

}
