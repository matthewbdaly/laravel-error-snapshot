<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Service provider for events
 */
class ErrorSnapshotEventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured' => [
            'Matthewbdaly\LaravelErrorSnapshot\Listeners\SnapshotCaptured',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
