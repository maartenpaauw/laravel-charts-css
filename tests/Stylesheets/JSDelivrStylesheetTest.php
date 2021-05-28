<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chart\Stylesheets\StylesheetStrategy;

class JSDelivrStylesheetTest extends StylesheetStrategyTest
{
    protected function stylesheet(): StylesheetStrategy
    {
        return new JSDelivrStylesheet();
    }

    protected function href(): string
    {
        return 'https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css';
    }
}
