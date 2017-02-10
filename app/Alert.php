<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Votable
{
    protected $fillable = [
        'description',
        'user_id',
    ];

}
