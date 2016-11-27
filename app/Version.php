<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{

    protected $fillable = [
        'id', 'verison',
    ];

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
