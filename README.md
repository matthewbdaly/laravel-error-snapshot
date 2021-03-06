# laravel-error-snapshot

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-error-snapshot.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-error-snapshot)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-error-snapshot/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-error-snapshot?branch=master)

Stores errors from both the client and server side in a consistent format to aid debugging.

Use case
--------

With the rise of single-page web apps, many modern web apps have moved functionality that was previously handled on the server side to the client side. This is not without its advantages, but it means that many errors that may occur are locked up in the user's web browser where they can't easily be reported and fixed.

This package provides an API endpoint for Laravel applications that accepts a stack trace for an error, as well as an optional representation of the application state and a meta field for other data. It works by triggering an event when a request is received, and the event listener persists the data to the database.

You can also trigger this event yourself if you wish to capture a server-side exception. This allows for storing all of your exceptions in one place for easier management.

Installation
------------

```bash
$ composer require matthewbdaly/laravel-error-snapshot
```

Usage
-----

This package exposes an API endpoint at `/api/snapshot`. If you want to store an error that occurs on the client side, you should make a `POST` request to that endpoint with the following parameters:

* `trace` - The full stack trace of the error (required).
* `state` - The JSON representation of the application state. This is primarily for cases where you're using a data store such as Redux or Vuex.
* `meta` - A JSON representation of any other data you would like to store to help with debugging, such as the current route, a JSON web token or shopping cart state

If the user is logged in, the user ID will also be captured automatically.

For server-side applications, you should instead trigger the event `Matthewbdaly\LaravelErrorSnapshot\Events\SnapshotCaptured` and pass the same data into the constructor as an array:

```php
$data = [
    'trace' => $trace,
    'state' => $state,
    'meta' => $meta,
    'user_id' => Auth::user()->id,
];
event(new SnapshotCaptured($data));
```

You'll probably want to do this in your main exception handler in most cases.

Viewing snapshots
-----------------

As viewing snapshots is going to be application-specific, there are no views, controllers or routes for displaying them. You should implement this functionality yourself. There is already a repository included that you can use to retrieve the snapshots - just typehint `Matthewbdaly\LaravelErrorSnapshot\Contracts\Repositories\Snapshot` to retrieve it.
