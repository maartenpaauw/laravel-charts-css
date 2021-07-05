<?php

namespace Maartenpaauw\Chartscss\Tests\Specifications;

use Maartenpaauw\Chartscss\Specifications\AndSpecification;
use Maartenpaauw\Chartscss\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chartscss\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chartscss\Tests\TestCase;

class AndSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_false_when_all_specifications_are_dissatisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(
            new NegativeSpecification(),
            new NegativeSpecification(),
            new NegativeSpecification(),
        );

        // Act
        $satisfied = $andSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_when_one_of_the_specifications_is_dissatisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(
            new NegativeSpecification(),
            new PositiveSpecification(),
            new PositiveSpecification(),
        );

        // Act
        $satisfied = $andSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_false_multiple_specifications_are_dissatisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(
            new NegativeSpecification(),
            new NegativeSpecification(),
            new PositiveSpecification(),
        );

        // Act
        $satisfied = $andSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_all_specifications_are_satisfied(): void
    {
        // Arrange
        $andSpecification = new AndSpecification(
            new PositiveSpecification(),
            new PositiveSpecification(),
            new PositiveSpecification(),
        );

        // Act
        $satisfied = $andSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }
}
