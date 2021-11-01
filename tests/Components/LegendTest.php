<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Components\Legend as LegendComponent;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Types\Bar;

class LegendTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        $legend = (new Legend())
            ->withLabel('Label A')
            ->withLabel('Label B')
            ->inline()
            ->circles();

        $configuration = new Configuration(
            new Identity('my-chart', 'This is my chart!', new Bar()),
            $legend,
            new Modifications(),
            new Colorscheme(),
        );

        return (new LegendComponent($configuration));
    }

    /** @test */
    public function it_should_render_the_component_correctly(): void
    {
        // Act
        $render = $this->component()
            ->render()
            ->with('attributes', new ComponentAttributeBag())
            ->toHtml();

        // Assert
        $this->assertMatchesSnapshot(
            $render,
            new CustomHtmlDriver(),
        );
    }
}
