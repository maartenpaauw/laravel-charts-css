<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\NullStylesheet;
use Maartenpaauw\Chart\Stylesheets\Stylesheet;

class NullStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): Stylesheet
    {
        return new NullStylesheet();
    }

    protected function href(): string
    {
        return '';
    }
}
