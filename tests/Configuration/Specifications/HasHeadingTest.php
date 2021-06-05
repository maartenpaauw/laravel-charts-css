<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;

class HasHeadingTest extends TestCase
{
    private ConfigurationSpecification $hasHeading;

    private Legend $legend;

    private ModificationsBag $modificationsBag;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasHeading = new HasHeading();
        $this->legend = new Legend();
        $this->modificationsBag = new ModificationsBag();
        $this->colorscheme = new Colorscheme();
    }

    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_a_heading(): void
    {
        // Arrange
        $configuration = new Configuration(
            new Identity('This is my chart', 'my-chart'),
            $this->legend,
            $this->modificationsBag,
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
            new Identity('', 'my-chart'),
            $this->legend,
            $this->modificationsBag,
            $this->colorscheme,
        );

        // Act
        $satisfied = $this->hasHeading->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
