<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Tests\Snapshot\TestCase;

abstract class AbstractComponentTest extends TestCase
{
    abstract protected function component(): Component;

    /** @test */
    public function it_should_render_the_component_correctly(): void
    {
        // Act
        $render = $this->component()->render();

        if (! is_string($render)) {
            $render = $render->toHtml();
        }

        // Assert
        $this->assertMatchesSnapshot(
            $render,
            new CustomHtmlDriver(),
        );
    }
}
