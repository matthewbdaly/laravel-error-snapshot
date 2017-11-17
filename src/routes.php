<?php

use Illuminate\Support\Facades\Route;

Route::post('/api/snapshot', 'Matthewbdaly\LaravelErrorSnapshot\Http\Controllers\ErrorSnapshotController@store');
