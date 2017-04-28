<?php

namespace App\Http\Controllers;

use App\Events\UserVoted;
use App\Vote;
use Illuminate\Http\Request;

class PostVoteController extends Controller
{
    public function store(Request $request, $type, $votable_id, $vote)
    {
        if ($type == 'answer') {
            $votable = \App\Answer::where('id', $votable_id)->first();
        }
        elseif ($type == 'past_paper')
        {
            $votable = \App\PastPaper::where('id', $votable_id)->first();
        }
        elseif ($type == 'subject')
        {
            $votable = \App\Subject::where('id', $votable_id)->first();
        }
        elseif ($type == 'suggested_release_date')
        {
            $votable = \App\SuggestedReleaseDate::where('id', $votable_id)->first();
        }
        elseif ($type == 'question')
        {
            $votable = \App\Question::where('id', $votable_id)->first();
        }

        $vote = $vote * $request->user()->voting_power;

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
            event(new UserVoted($votable));

        }

        return back();
    }
}
