<?php

namespace Maartenpaauw\Chartscss;

use Maartenpaauw\Chartscss\Commands\MakeChartCommand;
use Maartenpaauw\Chartscss\Components\Colorscheme;
use Maartenpaauw\Chartscss\Components\Entry;
use Maartenpaauw\Chartscss\Components\Heading;
use Maartenpaauw\Chartscss\Components\Label;
use Maartenpaauw\Chartscss\Components\Legend;
use Maartenpaauw\Chartscss\Components\Stylesheet;
use Maartenpaauw\Chartscss\Components\Table;
use Maartenpaauw\Chartscss\Configuration\Specifications\Directives;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasLabels;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class ChartscssServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-charts-css')
            ->hasViews()
            ->hasCommand(MakeChartCommand::class)
            ->hasViewComponent('charts-css', Colorscheme::class)
            ->hasViewComponent('charts-css', Entry::class)
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
