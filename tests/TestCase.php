<?php

namespace AlejandroAkbal\ScoutAdvancedMeilisearch\Tests;

use AlejandroAkbal\ScoutAdvancedMeilisearch\ScoutAdvancedMeilisearchServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            ScoutAdvancedMeilisearchServiceProvider::class,
        ];
    }
}
