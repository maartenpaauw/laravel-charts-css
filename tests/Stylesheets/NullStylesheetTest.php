<?php

namespace Maartenpaauw\Chartscss\Tests\Stylesheets;

use Maartenpaauw\Chartscss\Stylesheets\NullStylesheet;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetContract;

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
