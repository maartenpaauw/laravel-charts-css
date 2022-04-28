<?php

namespace Maartenpaauw\Chartscss\Stylesheets;

final class StylesheetFactory
{
    public function create(string $cdn = ''): StylesheetContract
    {
        return match ($cdn) {
            'jsdelivr' => new JSDelivrStylesheet(),
            'unpkg' => new UnpkgStylesheet(),
            default => new NullStylesheet(),
        };
    }
}
