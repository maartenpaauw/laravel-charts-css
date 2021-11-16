<?php

namespace Maartenpaauw\Chartscss\Tests;

use Illuminate\Config\Repository;
use Maartenpaauw\Chartscss\ChartscssServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ChartscssServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        /** @var Repository $config */
        $config = config();

        $config->set('database.default', 'testing');
    }
}
