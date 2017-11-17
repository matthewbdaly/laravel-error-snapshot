<?php

namespace Matthewbdaly\LaravelErrorSnapshot\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Snapshot model
 */
class Snapshot extends Model
{
    use SoftDeletes;

    /**
     * Fillable
     *
     * @var $fillable
     */
    protected $fillable = [
        'meta',
        'state',
        'trace',
        'user_id',
    ];
}
