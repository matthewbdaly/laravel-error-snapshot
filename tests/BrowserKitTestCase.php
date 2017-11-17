<?php

namespace Tests;

use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;

class BrowserKitTestCase extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

    public function setUp()
    {
        parent::setUp();
        $this->artisan('migrate', ['--database' => 'sqlite']);
        $this->loadLaravelMigrations(['--database' => 'sqlite']);
        $this->withFactories(__DIR__.'/factories');
    }

	protected function getPackageProviders($app)
	{
        return [
            'Matthewbdaly\LaravelErrorSnapshot\Providers\ErrorSnapshotServiceProvider',
            'Matthewbdaly\LaravelErrorSnapshot\Providers\ErrorSnapshotEventServiceProvider'
        ];
    }
}
