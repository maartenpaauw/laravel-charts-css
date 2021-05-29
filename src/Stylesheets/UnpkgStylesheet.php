<?php

namespace Maartenpaauw\Chart\Stylesheets;

class UnpkgStylesheet implements Stylesheet
{
    public function href(): string
    {
        return 'https://unpkg.com/charts.css/dist/charts.min.css';
    }
}
