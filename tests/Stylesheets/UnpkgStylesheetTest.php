<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\Stylesheet;
use Maartenpaauw\Chart\Stylesheets\UnpkgStylesheet;

class UnpkgStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): Stylesheet
    {
        return new UnpkgStylesheet();
    }

    protected function href(): string
    {
        return 'https://unpkg.com/charts.css/dist/charts.min.css';
    }
}
