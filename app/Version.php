<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{

    protected $fillable = [
        'id', 'release_date',
    ];

    public function software()
    {
        return $this->belongsTo('App\Software');
    }

}
