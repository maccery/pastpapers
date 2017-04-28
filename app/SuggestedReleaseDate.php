<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestedReleaseDate extends Votable
{

    protected $fillable = [
        'id', 'release_date', 'user_id', 'past_paper_id'
    ];

    public function past_paper()
    {
        return $this->belongsTo('App\PastPaper');
    }

    public function confirmedReal()
    {
        $past_paper = $this->past_paper;
        $past_paper->confirmed_release_date = True;
        $past_paper->release_date = $this->release_date;
        $past_paper->save();
    }

    public function getRouteAttribute(){
        return route('browse_by_past_paper', ['subject' => 2, 'past_paper' => $this->past_paper]);
    }

    public function getFullNameAttribute() {
        return $this->release_date;
    }
}
