<?php

namespace Maartenpaauw\Chart\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Maartenpaauw\Chart\ChartServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            ChartServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
