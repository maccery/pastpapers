<?php

namespace App\Jobs;

use App\Alert;
use App\User;
use App\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PunishBadUsers implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $users;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($users)
    {
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Make a system vote
        $alert = Alert::create([
            'description' => 'For incorrectly voting on (x)',
            'user_id' => 1,
        ]);

        // Then make votes for every user
        foreach ($this->users as $user)
        {
            Vote::create([
                'votable_id' => $alert->id,
                'vote' => -10,
                'user_id' => 1,
                'votable_owner_id' => $user->id,
                'votable_type' => 'App\Alert',
            ]);
        }
    }
}
