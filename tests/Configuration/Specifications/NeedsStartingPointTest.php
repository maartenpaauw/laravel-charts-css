<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration\Specifications;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\Specifications\NeedsStartingPoint;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\Bar;
use Maartenpaauw\Chartscss\Types\Column;
use Maartenpaauw\Chartscss\Types\Line;

class NeedsStartingPointTest extends TestCase
{
    private NeedsStartingPoint $needsStartingPoint;

    private Legend $legend;

    private Modifications $modifications;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->needsStartingPoint = new NeedsStartingPoint();
        $this->legend = new Legend();
        $this->modifications = new Modifications();
        $this->colorscheme = new Colorscheme();
    }

    /** @test */
    public function it_should_return_true_when_the_chart_type_is_area(): void
    {
        // Arrange
        $identity = new Identity('', '', new Area());

        $configuration = new Configuration(
            $identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->needsStartingPoint->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_the_chart_type_is_line(): void
    {
        // Arrange
        $identity = new Identity('', '', new Line());

        $configuration = new Configuration(
            $identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->needsStartingPoint->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_chart_type_is_bar(): void
    {
        // Arrange
        $identity = new Identity('', '', new Bar());

        $configuration = new Configuration(
            $identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->needsStartingPoint->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_chart_type_is_column(): void
    {
        // Arrange
        $identity = new Identity('', '', new Column());

        $configuration = new Configuration(
            $identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->needsStartingPoint->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
