<?php

namespace Maartenpaauw\Chart\Stylesheets;

class JSDelivrStylesheet implements StylesheetStrategy
{
    public function href(): string
    {
        return 'https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css';
    }
}
