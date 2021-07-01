<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\NeedsStartingPoint;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Area;
use Maartenpaauw\Chart\Types\Bar;
use Maartenpaauw\Chart\Types\Column;
use Maartenpaauw\Chart\Types\Line;

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
