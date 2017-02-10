<?php

namespace App\Events;

use App\Votable;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserVoted
{
    use InteractsWithSockets, SerializesModels;

    public $votable;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Votable $votable)
    {
        $this->votable = $votable;
    }

}
