<?php

namespace Maartenpaauw\Chart\Tests\Specifications\Dummy;

use Maartenpaauw\Chart\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chart\Tests\TestCase;

class PositiveSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_be_satisfied(): void
    {
        // Arrange
        $positiveSpecification = new PositiveSpecification();

        // Act
        $satisfied = $positiveSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }
}
