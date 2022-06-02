<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateGroups
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
     public $count;
     public $user_id;
     public $project_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($count, $user_id, $project_id)
    {
        $this->count = $count;
        $this->user_id = $user_id;
        $this->project_id = $project_id;
    }
}