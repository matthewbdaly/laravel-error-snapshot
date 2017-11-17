<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot as SnapshotContract;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Snapshot decorator
 */
class Snapshot extends BaseDecorator implements SnapshotContract
{
    /**
     * Constructor
     *
     * @param SnapshotContract $repository The Snapshot repository.
     * @param Cache            $cache      The cache instance.
     * @return void
     */
    public function __construct(SnapshotContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
