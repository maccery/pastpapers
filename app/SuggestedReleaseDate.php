<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuggestedReleaseDate extends Votable
{

    protected $fillable = [
        'id', 'release_date', 'user_id', 'version_id'
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
    }

    public function confirmedReal()
    {
        $version = $this->version;
        $version->confirmed_release_date = True;
        $version->release_date = $this->release_date;
        $version->save();
    }
}
