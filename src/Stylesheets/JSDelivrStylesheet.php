<?php

namespace Maartenpaauw\Chart\Stylesheets;

class JSDelivrStylesheet implements Stylesheet
{
    public function href(): string
    {
        return 'https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css';
    }
}
