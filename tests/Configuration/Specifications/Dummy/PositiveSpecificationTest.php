<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications\Dummy;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\Column;

class PositiveSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_be_satisfied(): void
    {
        // Arrange
        $configuration = new Configuration(
            new Identity('', '', new Column()),
            new Legend(),
            new ModificationsBag(),
            new Colorscheme()
        );

        $positiveSpecification = new PositiveSpecification();

        // Act
        $satisfied = $positiveSpecification->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }
}
