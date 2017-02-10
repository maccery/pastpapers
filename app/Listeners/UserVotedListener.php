<?php

namespace App\Listeners;

use App\Events\UserVoted;
use App\Jobs\PunishBadUsers;
use App\Jobs\RewardUsers;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserVotedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

        if ($votable->points <= -1)
        {
            $votable->delete();

            // dispatch a job to punish  users who voted for this
            dispatch(new PunishBadUsers(collect($users), $votable));
        }
        elseif ($votable->points >= 1)
        {
            $votable->confirmedReal();

            // dispatch a job to reward these users
            dispatch(new RewardUsers(collect($users), $votable));
        }
    }
}
