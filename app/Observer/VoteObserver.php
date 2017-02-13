<?php

namespace App\Observers;

use App\Vote;

class VoteObserver
{
    /**
     * Listen to the Votable created event.
     *
     * @param  Vote  $votable
     * @return void
     */
    public function created(Vote $vote)
    {
        $user = $vote->votable_owner();
        $user->voting_power = 500;
        $user->save();
    }

    /**
     * Listen to the Votable deleted event.
     *
     * @param  Vote  $votable
     * @return void
     */
    public function handle(Vote $vote)
    {
        $user = $vote->votable_owner();
        $user->voting_power = 500;
        $user->save();
    }
}