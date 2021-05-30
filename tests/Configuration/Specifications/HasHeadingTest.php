<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Tests\TestCase;

class HasHeadingTest extends TestCase
{
    /** @test */
    public function it_should_return_true_when_the_given_configuration_has_a_heading(): void
    {
        // Arrange
        $configuration = new Configuration();
        $hasHeading = new HasHeading();

        // Act
        $satisfied = $hasHeading->isSatisfiedBy($configuration);

        // Assert
        $this->assertTrue($satisfied);
    }
}
