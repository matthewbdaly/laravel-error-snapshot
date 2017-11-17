<?php

namespace Tests\Unit\Providers;

use Mockery as m;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_sets_up_the_repository()
    {
        $repo = $this->app->make('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot');
        $this->assertInstanceOf(\Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories\Decorators\Snapshot::class, $repo);
    }
}
