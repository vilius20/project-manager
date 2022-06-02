<?php

namespace App\Listeners;

use App\Events\CreateGroups;
use App\Models\Group;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateGroupsListener
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
     * @param  \App\Events\CreateGroups  $event
     * @return void
     */
    public function handle(CreateGroups $event)
    {
         for ($i=0; $i < $event->count; $i++) { 
            Group::create([
                'user_id' => $event->user_id,
                'project_id' => $event->project_id,
                'title' => 'Group #',
            ]);
        }
    }
}