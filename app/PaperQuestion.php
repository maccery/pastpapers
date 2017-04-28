<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperQuestion extends Votable
{
    protected $fillable = [
        'number',
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