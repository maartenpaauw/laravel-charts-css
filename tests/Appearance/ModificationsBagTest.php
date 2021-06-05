<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\HideData;
use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowDataOnHover;
use Maartenpaauw\Chart\Appearance\ShowLabels;

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
    public function it_should_be_possible_to_list_all_modifications(): void
    {
        // Arrange
        $modificationsBag = new ModificationsBag([
            new HideData(),
            new ShowLabels(),
        ]);

        // Act
        [$hideData, $showLabels] = $modifications = $modificationsBag->toArray();

        // Assert
        $this->assertInstanceOf(HideData::class, $hideData);
        $this->assertInstanceOf(ShowLabels::class, $showLabels);
        $this->assertCount(2, $modifications);
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

    /** @test */
    public function it_should_be_possible_to_merge_two_modification_bags(): void
    {
        // Arrange
        $a = new ModificationsBag([new HideData()]);
        $b = new ModificationsBag([new ShowLabels()]);

        // Act
        $mergedModificationsBag = $a->merge($b);
        [$hideData, $showLabels] = $modifications = $mergedModificationsBag->toArray();

        // Assert
        $this->assertInstanceOf(HideData::class, $hideData);
        $this->assertInstanceOf(ShowLabels::class, $showLabels);
        $this->assertCount(2, $modifications);
    }
}
