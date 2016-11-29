<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class VersionVote extends Model
{

    protected $fillable = [
        'id', 'version_id', 'user_id', 'vote'
    ];

    public function version()
    {
        return $this->belongsTo('App\Version');
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
