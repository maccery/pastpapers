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
        $reward_points = $vote->vote;
        $this->updateVotingPower($user, $reward_points);
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
        $reward_points = $vote->vote;
        $this->updateVotingPower($user, $reward_points);
    }

    private function updateVotingPower($user, $reward_points)
    {
        $voting_power_buckets = Config::get('crowd_sourced.voting_power');
        $points = $user->points + $reward_points;
        $max_points = 0;
        foreach ($voting_power_buckets as $key => $value)
        {
            if ($points > $key) {
                $max_points = $value;
            }
        }
        $user->voting_power = $max_points;
        $user->points = $user->votes->sum('vote');
        $user->save();
    }
}