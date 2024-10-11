<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\ChangeDetected;
use Illuminate\Support\Facades\Log;

class LogChange
{
    //b4

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
     * @param  object  $event
     * @return void
     */
    public function handle(ChangeDetected $event)
    {
        Log::info('Change detected'. $event->message);
    }
}
