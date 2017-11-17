<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Snapshot extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'meta',
        'state',
        'trace',
        'user_id',
    ];
}
