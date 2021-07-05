<?php

namespace Maartenpaauw\Chartscss\Tests\Stylesheets;

use Maartenpaauw\Chartscss\Stylesheets\JSDelivrStylesheet;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetContract;

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
