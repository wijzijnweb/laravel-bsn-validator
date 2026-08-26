<?php

declare(strict_types=1);

namespace Wijzijnweb\LaravelBsnValidator\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Wijzijnweb\LaravelBsnValidator\LaravelBsnValidatorServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelBsnValidatorServiceProvider::class,
        ];
    }
}
