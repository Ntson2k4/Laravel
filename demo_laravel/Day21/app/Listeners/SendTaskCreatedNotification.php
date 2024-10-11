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

     //b2,4
     
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
        // \Log::info($event->message, ['task_id' => $event->task->id]);
        session()->flash('success', $event->message);
    }
}
