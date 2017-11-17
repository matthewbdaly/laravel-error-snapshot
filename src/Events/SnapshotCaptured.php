<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

/**
 * Snapshot captured event
 */
class SnapshotCaptured
{
    use Dispatchable, SerializesModels;

    /**
     * Snapshot data
     *
     * @var $data
     */
    protected $data;

    /**
     * Create a new event instance.
     *
     * @param array $data The snapshot data.
     * @return void
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Retrieve event data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
