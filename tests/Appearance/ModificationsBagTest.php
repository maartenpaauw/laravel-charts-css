<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;

class ModificationsBagTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new ModificationsBag([
            new HideData(),
            new Multiple(),
            new ShowDataOnHover(),
        ]);
    }

    public function classes(): array
    {
        return ['hide-data', 'multiple', 'show-data-on-hover'];
    }

    /** @test */
    public function it_should_be_possible_to_add_a_modification(): void
    {
        // Arrange
        $bag = new ModificationsBag();

        // Act
        $bag->add(new HideData());

        // Assert
        $this->assertCount(1, $bag->classes());
    }
}
