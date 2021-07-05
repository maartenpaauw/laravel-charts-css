<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration\Specifications;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Color;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;

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
