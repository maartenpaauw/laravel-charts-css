<?php

namespace Maartenpaauw\Chart\Tests\Configuration\Specifications;

use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Tests\TestCase;

class HasLabelsTest extends TestCase
{
    /** @test */
    public function it_should_return_true_by_because_the_configuration_has_dummy_labels_by_default(): void
    {
        // Arrange
        $hasLabels = new HasLabels();

        // Act
        $satisfied = $hasLabels->isSatisfiedBy(new Configuration());

        // Assert
        $this->assertTrue($satisfied);
    }
}
