<?php

namespace App\Jobs;

use App\Alert;
use App\Votable;
use App\Vote;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RewardUsers implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    public $users, $votable;

    /**
     * Create a new job instance.
     *
     * @param $users
     * @param Votable $votable
     */
    public function __construct($users, Votable $votable)
    {
        $this->users = $users;
        $this->votable = $votable;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        // Make a system vote
        $alert = Alert::firstOrCreate([
            'description' => 'For correctly voting on "' . $this->votable->fullName . '"',
            'user_id' => 1,
        ]);

        // Then make votes for every user
        foreach ($this->users as $user)
        {
            Vote::firstOrCreate([
                'votable_id' => $alert->id,
                'vote' => 10,
                'user_id' => 1,
                'votable_owner_id' => $user->id,
                'votable_type' => 'App\Alert',
            ]);
        }
    }
}
