<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Components\Heading;

class HeadingTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        return new Heading('Hello world!');
    }

    protected function render(): string
    {
        return (string) $this->component()->render();
    }
}
