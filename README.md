# laravel-error-snapshot

[![Build Status](https://travis-ci.org/matthewbdaly/laravel-error-snapshot.svg?branch=master)](https://travis-ci.org/matthewbdaly/laravel-error-snapshot)
[![Coverage Status](https://coveralls.io/repos/github/matthewbdaly/laravel-error-snapshot/badge.svg?branch=master)](https://coveralls.io/github/matthewbdaly/laravel-error-snapshot?branch=master)

Stores errors from both the client and server side in a consistent format to aid debugging.

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
