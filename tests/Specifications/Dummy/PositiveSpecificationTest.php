<?php

namespace Maartenpaauw\Chartscss\Tests\Specifications\Dummy;

use Maartenpaauw\Chartscss\Specifications\Dummy\PositiveSpecification;
use Maartenpaauw\Chartscss\Tests\TestCase;

class PositiveSpecificationTest extends TestCase
{
    /** @test */
    public function it_should_be_satisfied(): void
    {
        // Arrange
        /** @var PositiveSpecification<string> $positiveSpecification */
        $positiveSpecification = new PositiveSpecification();

        // Act
        $satisfied = $positiveSpecification->isSatisfiedBy('');

        // Assert
        $this->assertTrue($satisfied);
    }
}
