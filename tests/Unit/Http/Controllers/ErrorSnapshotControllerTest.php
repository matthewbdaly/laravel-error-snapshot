<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Matthewbdaly\LaravelErrorSnapshot\Http\Controllers\ErrorSnapshotController;
use Matthewbdaly\LaravelErrorSnapshot\Http\Requests\ErrorSnapshotRequest;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured;
use Mockery as m;

class ErrorSnapshotControllerTest extends TestCase
{
    public function testFireSnapshotEvent()
    {
        Event::fake();
        $request = ErrorSnapshotRequest::create('/api/snapshot', 'POST', [
            'state' => json_encode(['valid' => true]),
            'trace' => json_encode(['valid' => true]),
            'meta' => json_encode(['valid' => true]),
        ]);
        $auth = m::mock('Illuminate\Contracts\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn($auth);
        $auth->id = 1;
        $controller = new ErrorSnapshotController($auth);
        $controller->store($request);
        Event::assertDispatched(SnapshotCaptured::class);
    }
}
