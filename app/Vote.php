<?php

namespace App;

use App\Observers\VoteObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Vote extends Model
{
    use Notifiable;


    protected $fillable = [
        'vote', 'votable_id', 'votable_type', 'user_id', 'votable_owner_id',
    ];

    public function votable()
    {
        return $this->morphTo();
    }

    public function review()
    {
        return $this->belongsTo('App\Review');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function votable_owner()
    {
        return $this->belongsTo('App\User', 'votable_owner_id');
    }
    
    public function scopeAuthored($query, $votable_type)
    {
        $user = Auth::User();
        $user_id = (isset($user)) ? $user->id : NULL;

        return $query->where('user_id', $user_id)->where('votable_type', $votable_type);
    }

    public function scopeWithWhereHas($query, $relation, $constraint)
    {
        return $query->whereHas($relation, $constraint)
            ->with([$relation => $constraint]);
    }
}
