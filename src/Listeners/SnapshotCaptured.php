<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured as Capture;
use Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot;
use Matthewbdaly\LaravelErrorSnapshot\Exceptions\SnapshotDataIncomplete;

/**
 * Handles snapshot capture
 */
class SnapshotCaptured implements ShouldQueue
{
    /**
     * Repository
     *
     * @var $repository
     */
    protected $repository;

    /**
     * Create the event listener.
     *
     * @param Snapshot $repository The repository.
     * @return void
     */
    public function __construct(Snapshot $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the event.
     *
     * @param  Capture $event The capture event.
     * @return void
     */
    public function handle(Capture $event)
    {
        $data = $event->getData();
        if (!array_key_exists('trace', $data)) {
            throw new SnapshotDataIncomplete;
        }
        $this->repository->create($data);
    }
}
