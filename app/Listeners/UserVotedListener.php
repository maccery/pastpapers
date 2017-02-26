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

        if ($votable->points <= $this->reject_at)
        {
            $votable->delete();

            // dispatch a job to punish  users who voted for this
            // get users who voted FOR this thing
            $users = array();
            foreach ($votable->votes as $vote)
            {
                if ($vote->vote > 0) {
                    $users[] = $vote->author;
                }
            }

            dispatch(new PunishBadUsers(collect($users), $votable));
        }
        elseif ($votable->points >= $this->confirm_at)
        {
            $votable->confirmedReal();

            // dispatch a job to reward these users
            $users = array();
            foreach ($votable->votes as $vote)
            {
                if ($vote->vote < 0) {
                    $users[] = $vote->author;
                }
            }
            dispatch(new RewardUsers(collect($users), $votable));
        }
    }

}
