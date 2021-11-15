<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Maartenpaauw\Chartscss\Components\Heading;

class HeadingTest extends AbstractComponentTest
{
    protected function component(): Heading
    {
        return new Heading('Hello world!');
    }

    protected function render(): string
    {
        return $this->component()->render();
    }
}
