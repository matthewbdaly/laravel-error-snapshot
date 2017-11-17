<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models\Snapshot;

class SnapshotTest extends BrowserKitTestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCreateSnapshot($data)
    {
        $user = factory(\Tests\Fixtures\User::class)->create();
        $this->be($user);
        $response = $this->call(
            'POST',
            '/api/snapshot',
            $data
        );
        $this->assertResponseStatus(201);
        $snapshots = Snapshot::all();
        $this->assertCount(1, $snapshots);
        $saved = $snapshots[0];
        $this->assertEquals(json_encode(['valid' => true]), $saved->state);
        $this->assertEquals(json_encode(['valid' => true]), $saved->trace);
        $this->assertEquals(json_encode(['valid' => true]), $saved->meta);
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
