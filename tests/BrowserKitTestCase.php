<?php

namespace Tests;

use Orchestra\Testbench\BrowserKit\TestCase as BaseTestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery as m;

class BrowserKitTestCase extends BaseTestCase
{
    use MockeryPHPUnitIntegration, SetupApp;
}
