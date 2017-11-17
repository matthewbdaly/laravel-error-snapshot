<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot as SnapshotContract;
use Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models\Snapshot as Model;

/**
 * Snapshot repository
 */
class Snapshot extends Base implements SnapshotContract
{
    /**
     * Constructor
     *
     * @param Model $model The Snapshot model.
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
