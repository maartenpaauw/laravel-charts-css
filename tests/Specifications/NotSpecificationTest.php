<?php

namespace Maartenpaauw\Chart\Tests\Specifications;

use Maartenpaauw\Chart\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chart\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chart\Specifications\NotSpecification;
use Maartenpaauw\Chart\Tests\TestCase;

class NotSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_return_false_when_the_specification_is_satisfied(): void
    {
        // Arrange
        $notSpecification = new NotSpecification(new PositiveSpecification());

        // Act
        $satisfied = $notSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }

    /** @test */
    public function it_should_return_true_when_the_specification_is_dissatisfied(): void
    {
        // Arrange
        $notSpecification = new NotSpecification(new NegativeSpecification());

        // Act
        $satisfied = $notSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }
}
