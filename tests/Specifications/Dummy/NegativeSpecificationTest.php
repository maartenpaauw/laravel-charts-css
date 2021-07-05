<?php

namespace Maartenpaauw\Chartscss\Tests\Specifications\Dummy;

use Maartenpaauw\Chartscss\Specifications\Dummy\NegativeSpecification;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
