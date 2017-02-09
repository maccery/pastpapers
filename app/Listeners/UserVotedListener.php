<?php

namespace App\Listeners;

use App\Events\UserVoted;
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
        if ($votable->points <= -3)
        {
            $votable->delete();
        }
    }
}
