<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Components\Stylesheet;
use Maartenpaauw\Chartscss\Stylesheets\StylesheetFactory;

class StylesheetTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        return new Stylesheet(
            new StylesheetFactory(),
            'jsdelivr',
        );
    }

    /** @test */
    public function it_should_render_the_component_correctly(): void
    {
        $this->assertMatchesTextSnapshot($this->component()->render()->toHtml());
    }
}
