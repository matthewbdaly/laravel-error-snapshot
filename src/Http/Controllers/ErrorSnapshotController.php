<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Contracts\Auth\Guard;
use Matthewbdaly\LaravelErrorSnapshot\Http\Requests\ErrorSnapshotRequest;
use Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured;

/**
 * Snapshot controller
 */
class ErrorSnapshotController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Auth instance
     *
     * @var $auth
     */
    protected $auth;

    /**
     * Constructor
     *
     * @param Guard $auth The auth instance.
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ErrorSnapshotRequest $request The request.
     * @return \Illuminate\Http\Response
     */
    public function store(ErrorSnapshotRequest $request)
    {
        $data = $request->all();
        if ($user = $this->auth->user()) {
            $data['user_id'] = $user->id;
        }
        event(new SnapshotCaptured($data));
        return response()->json($data, 201);
    }
}
