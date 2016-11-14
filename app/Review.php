<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'description',
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

    public function author()
    {
        return $this->hasOne('App\User');
    }

}
