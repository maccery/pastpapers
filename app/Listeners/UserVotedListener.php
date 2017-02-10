<?php

namespace App\Listeners;

use App\Events\UserVoted;
use App\Jobs\PunishBadUsers;
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
        // get users who voted this way
        $users = array();
        foreach ($votable->votes as $vote)
        {
            $users[] = $vote->author;
        }

        if ($votable->points <= -1)
        {
            $votable->delete();

            // dispatch a job to punish these users
            dispatch(new PunishBadUsers(collect($users)));
        }
    }
}
