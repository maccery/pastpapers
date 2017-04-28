<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Votable
{

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function past_papers()
    {
        return $this->hasMany('App\PastPaper');
    }

    /**
     * Returns all the answers for all past_papers
     */
    public function answers()
    {
        return $this->hasManyThrough('App\Answer', 'App\PastPaper');
    }

    public function getRouteAttribute(){
        return route('browse_name', ['subject' => $this]);
    }

    public function getFullNameAttribute() {
        return $this->name;
    }
}
