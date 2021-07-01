<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Column;

class HasColorschemeTest extends TestCase
{
    private ConfigurationSpecification $hasColorscheme;

    private Identity $identity;

    private Legend $legend;

    private Modifications $modifications;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasColorscheme = new HasColorscheme();
        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->legend = new Legend();
        $this->modifications = new Modifications();
    }

    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_a_custom_colorscheme(): void
    {
        // Arrange
        $configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modifications,
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
            $this->modifications,
            new Colorscheme(),
        );

        // Act
        $satisfied = $this->hasColorscheme->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
