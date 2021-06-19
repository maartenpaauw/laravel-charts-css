<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chart\Stylesheets\StylesheetContract;

class JSDelivrStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): StylesheetContract
    {
        return new JSDelivrStylesheet();
    }

    protected function href(): string
    {
        return 'https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css';
    }
}
