<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TaskCreated;

class SendTaskCreatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */

     //b2 
     
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        session()->flash('success', $event->message);
    }
}
