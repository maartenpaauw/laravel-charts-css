<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Illuminate\View\Factory;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Components\Colorscheme as ColorschemeComponent;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Types\Bar;

class ColorschemeTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        $colorscheme = (new Colorscheme())
            ->add(new Color('#FF0000'))
            ->add(new Color('#00FF00'))
            ->add(new Color('#0000FF'));

        $configuration = new Configuration(
            new Identity('my-chart', 'This is my chart!', new Bar()),
            new Legend(),
            new Modifications(),
            $colorscheme,
        );

        return new ColorschemeComponent($configuration);
    }

    /** @test */
    public function it_should_render_the_component_correctly(): void
    {
        // Arrange
        /** @var Factory $viewFactory */
        $viewFactory = $this->app->make(Factory::class);

        // If we don't increment the render count the stacks will get flushed.
        $viewFactory->incrementRender();
        $viewFactory->startComponent($this->component()->render());

        // Act
        $component = $viewFactory->renderComponent();
        $stack = $viewFactory->yieldPushContent('charts.css');

        // Assert
        $this->assertEmpty($component);
        $this->assertMatchesSnapshot($stack, new CustomHtmlDriver());
    }
}
