<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Matthewbdaly\LaravelErrorSnapshot\Http\Requests\ErrorSnapshotRequest;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured;

class ErrorSnapshotController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Store a newly created resource in storage.
     *
     * @param  ErrorSnapshotRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorSnapshotRequest $request)
    {
        event(new SnapshotCaptured($request->all()));
    }
}
