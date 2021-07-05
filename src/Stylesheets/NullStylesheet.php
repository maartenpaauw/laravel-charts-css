<?php

namespace Maartenpaauw\Chartscss\Stylesheets;

class NullStylesheet implements StylesheetContract
{
    public function href(): string
    {
        return '';
    }
}
