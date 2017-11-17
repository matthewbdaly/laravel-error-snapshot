<?php

namespace Tests;


trait SetupApp
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

    protected function getPackageAliases($app)
    {
        return [
            'Route'     => \Illuminate\Support\Facades\Route::class,
        ];
    }
}
