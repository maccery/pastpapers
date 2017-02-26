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
}
