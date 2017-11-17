<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models\Snapshot;

class SnapshotTest extends TestCase
{
    public function testCreateSnapshot()
    {
        factory(Snapshot::class)->create([
            'state' => json_encode(['valid' => true]),
            'trace' => json_encode(['valid' => true]),
            'meta' => json_encode(['valid' => true]),
        ]);
        $saved = Snapshot::first();
        $this->assertEquals(json_encode(['valid' => true]), $saved->state);
        $this->assertEquals(json_encode(['valid' => true]), $saved->trace);
        $this->assertEquals(json_encode(['valid' => true]), $saved->meta);
        $this->assertNotNull($saved->created_at);
        $this->assertNotNull($saved->updated_at);
        $this->assertNull($saved->deleted_at);
    }
}
