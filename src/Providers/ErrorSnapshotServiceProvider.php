<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Service provider for flat pages
 */
class ErrorSnapshotServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes.php');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot', function () {
            $baseRepo = new \Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories\Snapshot(new \Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models\Snapshot);
            $cachingRepo = new \Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories\Decorators\Snapshot($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
