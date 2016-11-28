<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'vote', 'review_id', 'user_id'
    ];

    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }
}
