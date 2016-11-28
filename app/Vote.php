<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Vote extends Model
{
    protected $fillable = [
        'vote', 'review_id', 'user_id'
    ];

    public function review()
    {
        return $this->belongsTo('App\Review');
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
