<?php

namespace Maartenpaauw\Chartscss\Tests\Specifications;

use Maartenpaauw\Chartscss\Specifications\BasicSpecification;
use Maartenpaauw\Chartscss\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chartscss\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chartscss\Specifications\OrSpecification;
use Maartenpaauw\Chartscss\Tests\TestCase;

class OrSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_false_when_all_specifications_are_dissatisfied(): void
    {
        // Arrange
        /** @var OrSpecification<string, BasicSpecification> $orSpecification */
        $orSpecification = new OrSpecification([
            new NegativeSpecification(),
            new NegativeSpecification(),
            new NegativeSpecification(),
        ]);

        // Act
        $satisfied = $orSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_one_of_the_specifications_is_satisfied(): void
    {
        // Arrange
        /** @var OrSpecification<string, BasicSpecification> $orSpecification */
        $orSpecification = new OrSpecification([
            new PositiveSpecification(),
            new NegativeSpecification(),
            new NegativeSpecification(),
        ]);

        // Act
        $satisfied = $orSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_multiple_specifications_are_satisfied(): void
    {
        // Arrange
        /** @var OrSpecification<string, BasicSpecification> $orSpecification */
        $orSpecification = new OrSpecification([
            new PositiveSpecification(),
            new PositiveSpecification(),
            new NegativeSpecification(),
        ]);

        // Act
        $satisfied = $orSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_all_specifications_are_satisfied(): void
    {
        // Arrange
        /** @var OrSpecification<string, BasicSpecification> $orSpecification */
        $orSpecification = new OrSpecification([
            new PositiveSpecification(),
            new PositiveSpecification(),
            new PositiveSpecification(),
        ]);

        // Act
        $satisfied = $orSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }
}
