<?php

namespace Maartenpaauw\Chart\Stylesheets;

class NullStylesheet implements Stylesheet
{
    public function href(): string
    {
        return '';
    }
}
