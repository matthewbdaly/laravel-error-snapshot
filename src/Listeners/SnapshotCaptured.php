<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured as Capture;
use Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot;

class SnapshotCaptured
{
    protected $repository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Snapshot $repository)
    {
        $this->repository = $repository;
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
