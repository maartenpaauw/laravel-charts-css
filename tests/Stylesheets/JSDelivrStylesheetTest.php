<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chart\Stylesheets\Stylesheet;

class JSDelivrStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): Stylesheet
    {
        return new JSDelivrStylesheet();
    }

    protected function href(): string
    {
        return 'https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css';
    }
}
