<?php

namespace Maartenpaauw\Chartscss\Stylesheets;

class UnpkgStylesheet implements StylesheetContract
{
    public function href(): string
    {
        return 'https://unpkg.com/charts.css/dist/charts.min.css';
    }
}
