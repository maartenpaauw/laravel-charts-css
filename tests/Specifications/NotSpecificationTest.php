<?php

namespace Maartenpaauw\Chartscss\Tests\Specifications;

use Maartenpaauw\Chartscss\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chartscss\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chartscss\Specifications\NotSpecification;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
