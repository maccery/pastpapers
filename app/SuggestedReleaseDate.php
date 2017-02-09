<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestedReleaseDate extends Model
{
    use Votable;

    protected $fillable = [
        'id', 'release_date', 'user_id', 'version_id'
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

}
