<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;

class HasColorschemeTest extends TestCase
{
    private ConfigurationSpecification $hasColorscheme;

    private Identity $identity;

    private Legend $legend;

    private ModificationsBag $modificationsBag;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasColorscheme = new HasColorscheme();
        $this->identity = new Identity('My chart', 'my-chart');
        $this->legend = new Legend();
        $this->modificationsBag = new ModificationsBag();
    }

    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_a_custom_colorscheme(): void
    {
        // Arrange
        $configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modificationsBag,
            new Colorscheme([
                new Color('#FF0000'),
            ])
        );

        // Act
        $satisfied = $this->hasColorscheme->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_configuration_has_no_custom_colorscheme(): void
    {
        // Arrange
        $configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modificationsBag,
            new Colorscheme(),
        );

        // Act
        $satisfied = $this->hasColorscheme->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
