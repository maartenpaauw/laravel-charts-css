<?php

namespace Maartenpaauw\Chart;

use Maartenpaauw\Chart\Commands\MakeChartCommand;
use Maartenpaauw\Chart\Components\Colorscheme;
use Maartenpaauw\Chart\Components\Heading;
use Maartenpaauw\Chart\Components\Label;
use Maartenpaauw\Chart\Components\Legend;
use Maartenpaauw\Chart\Components\Stylesheet;
use Maartenpaauw\Chart\Components\Table;
use Maartenpaauw\Chart\Configuration\Specifications\Directives;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ChartServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-charts-css')
            ->hasViews()
            ->hasCommand(MakeChartCommand::class)
            ->hasViewComponent('charts-css', Colorscheme::class)
            ->hasViewComponent('charts-css', Heading::class)
            ->hasViewComponent('charts-css', Label::class)
            ->hasViewComponent('charts-css', Legend::class)
            ->hasViewComponent('charts-css', Stylesheet::class)
            ->hasViewComponent('charts-css', Table::class);

        (new Directives())
            ->register(new HasColorscheme(), 'hasColorscheme')
            ->register(new HasHeading(), 'hasHeading')
            ->register(new HasLabels(), 'hasLabels');
    }
}
