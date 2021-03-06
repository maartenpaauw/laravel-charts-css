<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Tests\Snapshot\TestCase;

abstract class AbstractComponentTest extends TestCase
{
    abstract protected function component(): Component;

    protected function render(): string
    {
        /** @var View $view */
        $view = $this->component()->render();

        return $view->toHtml();
    }

    /** @test */
    public function it_should_render_the_component_correctly(): void
    {
        $this->assertMatchesSnapshot(
            $this->render(),
            new CustomHtmlDriver(),
        );
    }
}
