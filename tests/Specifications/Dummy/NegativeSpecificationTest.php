<?php

namespace Maartenpaauw\Chart\Tests\Specifications\Dummy;

use Maartenpaauw\Chart\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chart\Tests\TestCase;

class NegativeSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_not_be_satisfied(): void
    {
        // Arrange
        $negativeSpecification = new NegativeSpecification();

        // Act
        $satisfied = $negativeSpecification->isSatisfiedBy('');

        // Assert
        $this->assertFalse($satisfied);
    }
}
