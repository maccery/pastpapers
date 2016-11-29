<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SuggestedReleaseDateVote extends Model
{
    protected $fillable = [
        'id', 'suggested_release_date_id', 'user_id', 'vote'
    ];

    public function suggestedReleaseDate()
    {
        return $this->belongsTo('App\SuggestedReleaseDate');
    }

    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeAuthored($query)
    {
        $user = Auth::User();
        $user_id = (isset($user)) ? $user->id : NULL;

        return $query->where('user_id', $user_id);
    }
}
