<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration\Specifications;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;
use Maartenpaauw\Specifications\Specification;

class HasHeadingTest extends TestCase
{
    /** @var Specification<ConfigurationContract> */
    private Specification $hasHeading;

    private Legend $legend;

    private Modifications $modifications;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasHeading = new HasHeading();
        $this->legend = new Legend();
        $this->modifications = new Modifications();
        $this->colorscheme = new Colorscheme();
    }

    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_a_heading(): void
    {
        // Arrange
        $configuration = new Configuration(
            new Identity('my-chart', 'This is my chart', new Column()),
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->hasHeading->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_configuration_does_not_have_a_heading(): void
    {
        // Arrange
        $configuration = new Configuration(
            new Identity('my-chart', '', new Column()),
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->hasHeading->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
