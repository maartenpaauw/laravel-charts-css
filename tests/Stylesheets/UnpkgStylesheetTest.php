<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\StylesheetStrategy;
use Maartenpaauw\Chart\Stylesheets\UnpkgStylesheet;

class UnpkgStylesheetTest extends StylesheetStrategyTest
{
    protected function stylesheet(): StylesheetStrategy
    {
        return new UnpkgStylesheet();
    }

    protected function href(): string
    {
        return 'https://unpkg.com/charts.css/dist/charts.min.css';
    }
}
