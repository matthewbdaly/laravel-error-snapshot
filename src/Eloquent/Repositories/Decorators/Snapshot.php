<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot as SnapshotContract;
use Illuminate\Contracts\Cache\Repository as Cache;

class Snapshot extends BaseDecorator implements SnapshotContract
{
    public function __construct(SnapshotContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
