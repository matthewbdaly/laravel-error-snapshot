<?php

namespace Tests;

trait CreatesApp
{
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
