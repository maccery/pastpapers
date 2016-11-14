<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{

    protected $fillable = [
        'name',
    ];

    public function version()
    {
        return $this->hasMany('App\Version');
    }

}
