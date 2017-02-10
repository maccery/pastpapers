<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alert extends Votable
{
    protected $fillable = [
        'description',
        'user_id',
    ];

    protected $appends = ['full_name'];

    public function getRewardedForAttribute() {
        return 'Voting';
    }

    public function getFullNameAttribute() {
        return $this->description;
    }
}
