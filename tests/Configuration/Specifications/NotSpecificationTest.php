<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chart\Configuration\Specifications\NotSpecification;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Column;

class NotSpecificationTest extends TestCase
{
    private ConfigurationContract $configuration;

    protected function setUp(): void
    {
        parent::setUp();

        $this->configuration = new Configuration(
            new Identity('', '', new Column()),
            new Legend(),
            new ModificationsBag(),
            new Colorscheme(),
        );
    }

    /** @test */
    public function it_should_return_false_when_a_positive_specification_is_given(): void
    {
        // Arrange
        $notSpecification = new NotSpecification(new PositiveSpecification());

        // Act
        $satisfied = $notSpecification->isSatisfiedBy($this->configuration);

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_a_negative_specification_is_given(): void
    {
        // Arrange
        $notSpecification = new NotSpecification(new NegativeSpecification());

        // Act
        $satisfied = $notSpecification->isSatisfiedBy($this->configuration);

        // Assert
        $this->assertTrue($satisfied);
    }
}
