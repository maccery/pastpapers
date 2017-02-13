<?php

namespace App\Listeners;

use App\Events\UserVoted;
use App\Jobs\PunishBadUsers;
use App\Jobs\RewardUsers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Config;

class UserVotedListener
{
    private $reject_at, $confirm_at;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->reject_at = Config::get('crowd_sourced.reject_at');
        $this->confirm_at = Config::get('crowd_sourced.confirm_at');
    }

    /**
     * Handle the event.
     *
     * @param  UserVoted  $event
     * @return void
     */
    public function handle(UserVoted $event)
    {
        $votable = $event->votable;
        // get users who voted FOR this thing
        $users = array();
        foreach ($votable->votes as $vote)
        {
            if ($vote->vote > 0) {
                $users[] = $vote->author;
            }
        }

        if ($votable->points <= $this->reject_at)
        {
            $votable->delete();

            // dispatch a job to punish  users who voted for this
            dispatch(new PunishBadUsers(collect($users), $votable));
        }
        elseif ($votable->points >= $this->confirm_at)
        {
            $votable->confirmedReal();

            // dispatch a job to reward these users
            dispatch(new RewardUsers(collect($users), $votable));
        }
    }

    private function updateVotingPower($user)
    {
        $voting_power_buckets = Config::get('crowd_sourced.voting_power');
        $points = $this->points;
        $max_points = 1;
        foreach ($voting_power_buckets as $key => $value)
        {
            if ($points < $key) {
                return $max_points;
            }
            else
            {
                $max_points = $value;
            }
        }
        $user->voting_power = $max_points;
        $user->save();
    }
}
