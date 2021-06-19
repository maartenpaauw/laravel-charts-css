<?php

namespace Maartenpaauw\Chart\Stylesheets;

class NullStylesheet implements StylesheetContract
{
    public function href(): string
    {
        return '';
    }
}
