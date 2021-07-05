<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\HideData;
use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Appearance\Multiple;
use Maartenpaauw\Chartscss\Appearance\ShowDataOnHover;
use Maartenpaauw\Chartscss\Appearance\ShowLabels;

class ModificationsTest extends ModificationTest
{
    public function modification(): Modification
    {
        return new Modifications([
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
        $modifications = new Modifications([
            new HideData(),
            new ShowLabels(),
        ]);

        // Act
        [$hideData, $showLabels] = $modifications = $modifications->toArray();

        // Assert
        $this->assertInstanceOf(HideData::class, $hideData);
        $this->assertInstanceOf(ShowLabels::class, $showLabels);
        $this->assertCount(2, $modifications);
    }

    /** @test */
    public function it_should_be_possible_to_add_a_modification(): void
    {
        // Act
        $modifications = (new Modifications())->add(new HideData());

        // Assert
        $this->assertCount(1, $modifications->classes());
    }

    /** @test */
    public function it_should_be_possible_to_merge_two_modification_instances(): void
    {
        // Arrange
        $a = new Modifications([new HideData()]);
        $b = new Modifications([new ShowLabels()]);

        // Act
        $mergedModifications = $a->merge($b);
        [$hideData, $showLabels] = $modifications = $mergedModifications->toArray();

        // Assert
        $this->assertInstanceOf(HideData::class, $hideData);
        $this->assertInstanceOf(ShowLabels::class, $showLabels);
        $this->assertCount(2, $modifications);
    }

    /** @test */
    public function it_should_be_possible_to_convert_it_to_a_string(): void
    {
        // Arrange
        $modifications = new Modifications([
            new HideData(),
            new ShowLabels(),
        ]);

        // Act
        $string = $modifications->toString();

        // Assert
        $this->assertEquals('hide-data show-labels', $string);
    }
}
