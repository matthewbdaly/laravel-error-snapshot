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
        $repo->shouldReceive('create')->with($data)->once();
        $this->app->instance('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot', $repo);
        event(new SnapshotCaptured($data));
    }
    /**
     * @dataProvider dataProvider
     * @expectedException Matthewbdaly\LaravelErrorSnapshot\Exceptions\SnapshotDataIncomplete
     */
    public function testCaptureSnapshotIncompleteData($data)
    {
        unset($data['trace']);
        $repo = m::mock('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot');
        $this->app->instance('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot', $repo);
        event(new SnapshotCaptured($data));
    }

    public function dataProvider()
    {
        return [[[
            'state' => json_encode(['valid' => true]),
            'trace' => json_encode(['valid' => true]),
            'meta' => json_encode(['valid' => true]),
            'user_id' => 1,
        ]]];
    }
}
