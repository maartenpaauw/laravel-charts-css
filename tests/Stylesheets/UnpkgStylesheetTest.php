<?php

namespace Maartenpaauw\Chartscss\Tests\Stylesheets;

use Maartenpaauw\Chartscss\Stylesheets\StylesheetContract;
use Maartenpaauw\Chartscss\Stylesheets\UnpkgStylesheet;

class UnpkgStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): StylesheetContract
    {
        return new UnpkgStylesheet();
    }

    protected function href(): string
    {
        return 'https://unpkg.com/charts.css/dist/charts.min.css';
    }
}
