<?php

namespace Tests\Unit\Events;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured;
use Mockery as m;

class SnapshotCapturedTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCaptureSnapshot($data)
    {
        $repo = m::mock('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot');
        $this->app->instance('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot', $repo);
        event(new SnapshotCaptured($data));
        $repo->shouldHaveReceived('create')->with($data)->once();
    }

    public function dataProvider()
    {
        return [[[
            'state' => json_encode(['valid' => true]),
            'trace' => json_encode(['valid' => true]),
            'meta' => json_encode(['valid' => true]),
        ]]];
    }
}
