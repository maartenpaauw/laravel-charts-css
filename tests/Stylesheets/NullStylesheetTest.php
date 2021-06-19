<?php

namespace Maartenpaauw\Chart\Tests\Stylesheets;

use Maartenpaauw\Chart\Stylesheets\NullStylesheet;
use Maartenpaauw\Chart\Stylesheets\StylesheetContract;

class NullStylesheetTest extends StylesheetTest
{
    protected function stylesheet(): StylesheetContract
    {
        return new NullStylesheet();
    }

    protected function href(): string
    {
        return '';
    }
}
