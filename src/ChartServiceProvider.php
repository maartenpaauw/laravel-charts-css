<?php

namespace Maartenpaauw\Chart;

use Maartenpaauw\Chart\Components\Colorscheme;
use Maartenpaauw\Chart\Components\Heading;
use Maartenpaauw\Chart\Components\Legend;
use Maartenpaauw\Chart\Components\Stylesheet;
use Maartenpaauw\Chart\Components\Table;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ChartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-charts-css')
            ->hasViews()
            ->hasViewComponent('charts-css', Colorscheme::class)
            ->hasViewComponent('charts-css', Heading::class)
            ->hasViewComponent('charts-css', Legend::class)
            ->hasViewComponent('charts-css', Stylesheet::class)
            ->hasViewComponent('charts-css', Table::class);
    }
}
