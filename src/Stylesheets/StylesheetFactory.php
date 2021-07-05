<?php

namespace Maartenpaauw\Chartscss\Stylesheets;

class StylesheetFactory
{
    public function create(string $cdn = ''): StylesheetContract
    {
        switch ($cdn) {
            case 'jsdelivr':
                return new JSDelivrStylesheet();
            case 'unpkg':
                return new UnpkgStylesheet();
            default:
                return new NullStylesheet();
        }
    }
}
