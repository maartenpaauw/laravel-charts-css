<?php

namespace Maartenpaauw\Chartscss\Tests\Examples;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Tests\Snapshot\TestCase;

abstract class ExampleTest extends TestCase
{
    abstract protected function chart(): Component;

    /** @test */
    public function it_should_render_the_example_chart_correctly(): void
    {
        /** @var View $view */
        $view = $this->chart()->render();

        $this->assertMatchesSnapshot(
            $view->toHtml(),
            new CustomHtmlDriver(),
        );
    }
}
