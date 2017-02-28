<?php

namespace App\Observers;

use App\Vote;
use Illuminate\Support\Facades\Config;

class VoteObserver
{
    /**
     * If someone creates a vote, give the owner of the thing being voted on more
     * voting power if applicable
     *
     * @param  Vote  $votable
     * @return void
     */
    public function created(Vote $vote)
    {
        $user = $vote->votable_owner()->first();
        $user->updateVotingPower($user);
    }

    /**
     * If a vote is deleted, get the owner of the thing being voted on and update
     * their voting power if applicable
     *
     * @param  Vote  $votable
     * @return void
     */
    public function deleted(Vote $vote)
    {
        $user = $vote->votable_owner()->first();
        $user->updateVotingPower($user);
    }
}