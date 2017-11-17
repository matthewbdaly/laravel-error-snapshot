<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured as Capture;

class SnapshotCaptured
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
     * @param  Capture  $event
     * @return void
     */
    public function handle(Capture $event)
    {
        //
    }
}
