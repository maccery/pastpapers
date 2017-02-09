<?php

namespace App\Http\Controllers;

use App\Vote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    public function store(Request $request, $type, $votable_id, $vote)
    {
        if ($type == 'review') {
            $votable = \App\Review::where('id', $votable_id)->first();
        }
        elseif ($type == 'version')
        {
            $votable = \App\Version::where('id', $votable_id)->first();
        }
        elseif ($type == 'suggested_release_date')
        {
            $votable = \App\SuggestedReleaseDate::where('id', $votable_id)->first();
        }
        if (isset($votable))
        {
            $keys = [
                'votable_id' => $votable->id,
                'votable_type' => get_class($votable),
                'user_id' => $request->user()->id,
                'votable_owner_id' => $votable->user_id,
            ];

            $current_vote = Vote::where($keys)->first();
            if (isset($current_vote)) {
                $current_vote->delete();
            }
            if (!isset($current_vote) or isset($current_vote) and $current_vote->vote != $vote) {
                Vote::updateOrCreate($keys, [
                    'vote' => $vote,
                ]);
            }
        }
        return back();
    }
}
