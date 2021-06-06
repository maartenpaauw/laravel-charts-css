<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\ConfigurationSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Column;

class HasLabelsTest extends TestCase
{
    private ConfigurationSpecification $hasLabels;

    private Identity $identity;

    private ModificationsBag $modifications;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->hasLabels = new HasLabels();
        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->modifications = new ModificationsBag();
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
