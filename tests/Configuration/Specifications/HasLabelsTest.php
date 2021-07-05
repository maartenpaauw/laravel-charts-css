<?php

namespace Maartenpaauw\Chartscss\Tests\Configuration\Specifications;

use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chartscss\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;

class HasLabelsTest extends TestCase
{
    private ConfigurationSpecification $hasLabels;

    private Identity $identity;

    private Modifications $modifications;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasLabels = new HasLabels();
        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->modifications = new Modifications();
        $this->colorscheme = new Colorscheme();
    }

    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_legend_labels(): void
    {
        // Arrange
        $legend = new Legend([
            'Label A',
            'Label B',
            'Label C',
        ]);

        $configuration = new Configuration(
            $this->identity,
            $legend,
            $this->modifications,
            $this->colorscheme
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_the_given_configuration_does_not_have_legend_labels(): void
    {
        // Arrange
        $configuration = new Configuration(
            $this->identity,
            new Legend(),
            $this->modifications,
            $this->colorscheme
        );

        // Act
        $satisfied = $this->hasLabels->isSatisfiedBy($configuration);

        // Assert
        $this->assertFalse($satisfied);
    }
}
