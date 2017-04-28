<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Votable
{

    protected $fillable = [
        'description',
        'user_id',
        'past_paper_id',
        'subject_id',
        'title',
    ];

    public function past_paper()
    {
        return $this->belongsTo('App\PaperQuestion');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function getRouteAttribute(){
        return route('answer', ['answer' => $this]);
    }

    public function getFullNameAttribute() {
        return $this->title;
    }

    public function confirmedReal() {}

}
