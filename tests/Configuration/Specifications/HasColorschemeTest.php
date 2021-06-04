<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Tests\TestCase;

class HasColorschemeTest extends TestCase
{
    /** @test */
    public function it_should_return_false_because_the_default_configuration_does_not_have_colors_overwritten(): void
    {
        // Arrange
        $hasColorscheme = new HasColorscheme();

        // Act
        $satisfied = $hasColorscheme->isSatisfiedBy(new Configuration());

        // Assert
        $this->assertFalse($satisfied);
    }
}
