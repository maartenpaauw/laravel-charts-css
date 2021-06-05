<?php

namespace Maartenpaauw\Chart\Tests\Legend;

use Maartenpaauw\Chart\Legend\Appearance\Inline;
use Maartenpaauw\Chart\Legend\Appearance\Square;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;

class LegendTest extends TestCase
{
    private array $labels;

    private Legend $legend;

    protected function setUp(): void
    {
        parent::setUp();

        $this->labels = ['Label A', 'Label B', 'Label C'];
        $this->legend = new Legend($this->labels, [new Inline(), new Square()]);
    }

    /** @test */
    public function it_should_be_possible_to_access_the_labels(): void
    {
        // Arrange
        $expectedLabels = $this->labels;

        // Act
        $labels = $this->legend->labels();

        // Assert
        $this->assertCount(3, $labels);
        $this->assertEquals($expectedLabels, $labels);
    }

    /** @test */
    public function it_should_return_a_classes_array(): void
    {
        // Act
        $classes = $this->legend->classes();

        // Assert
        $this->assertCount(2, $classes);
        $this->assertContains('legend-inline', $classes);
        $this->assertContains('legend-square', $classes);
    }

    /** @test */
    public function it_should_be_possible_to_add_a_label(): void
    {
        // Arrange
        $legend = new Legend();
        $expectedLabel = 'Label A';

        // Act
        $labels = $legend
            ->withLabel($expectedLabel)
            ->labels();

        // Assert
        $this->assertCount(1, $labels);
        $this->assertContains($expectedLabel, $labels);
    }

    /** @test */
    public function it_should_be_possible_to_add_a_modification(): void
    {
        // Arrange
        $legend = new Legend();
        $inline = new Inline();

        // Act
        $legend->withModification($inline);

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-inline', $legend->classes());
    }
}
