<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Votable
{

    protected $fillable = [
        'description',
        'user_id',
        'paper_question_id',
        'subject_id',
    ];

    public function paper_question()
    {
        return $this->belongsTo('App\PaperQuestion');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function getRouteAttribute(){
        return route('browse_answers', ['subject' => $this->subject, 'past_paper' => $this->paper_question->past_paper, 'paper_question' => $this->past_paper]);
    }

    public function getFullNameAttribute() {
        return 'Answer: ' . $this->paper_question_id;
    }

    public function confirmedReal() {}

}
