<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Votable
{
    protected $fillable = [
        'question',
        'answer',
        'user_id',
        'confirmed_real',
    ];

    public function getRouteAttribute(){
        return route('help');
    }

    public function getFullNameAttribute() {
        return $this->question;
    }
}
