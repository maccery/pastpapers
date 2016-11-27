<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'description',
        'user_id',
        'version_id',
        'software_id'
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

}
