<?php

namespace Maartenpaauw\Chartscss\Tests\Legend;

use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Legend\Appearance\Inline;
use Maartenpaauw\Chartscss\Legend\Appearance\Square;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\TestCase;

class LegendTest extends TestCase
{
    private array $labels;

    private Legend $legend;

    protected function setUp(): void
    {
        parent::setUp();

        $this->labels = ['Label A', 'Label B', 'Label C'];
        $this->legend = new Legend(
            $this->labels,
            new Modifications([
                new Inline(),
                new Square(),
            ]),
        );
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
    public function it_should_be_possible_to_add_multiple_labels_at_once(): void
    {
        // Arrange
        $legend = new Legend();
        $labelA = 'Label A';
        $labelB = 'Label B';

        // Act
        $labels = $legend
            ->withLabels([$labelA, $labelB])
            ->labels();

        // Assert
        $this->assertCount(2, $labels);
        $this->assertContains($labelA, $labels);
        $this->assertContains($labelB, $labels);
    }

    /** @test */
    public function it_should_be_possible_to_inline_the_legend(): void
    {
        // Act
        $legend = (new Legend())->inline();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-inline', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_circles(): void
    {
        // Act
        $legend = (new Legend())->circles();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-circle', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_ellipses(): void
    {
        // Act
        $legend = (new Legend())->ellipses();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-ellipse', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_lines(): void
    {
        // Act
        $legend = (new Legend())->lines();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-line', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_rectangles(): void
    {
        // Act
        $legend = (new Legend())->rectangles();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-rectangle', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_rhombuses(): void
    {
        // Act
        $legend = (new Legend())->rhombuses();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-rhombus', $legend->classes());
    }

    /** @test */
    public function it_should_be_possible_to_change_the_legend_shape_to_squares(): void
    {
        // Act
        $legend = (new Legend())->squares();

        // Assert
        $this->assertCount(1, $legend->classes());
        $this->assertContains('legend-square', $legend->classes());
    }

    /** @test */
    public function it_should_use_the_ul_html_tag_as_default(): void
    {
        // Arrange
        $expectedTag = 'ul';

        // Act
        $tag = $this->legend->tag();

        // Assert
        $this->assertEquals($expectedTag, $tag);
    }

    /** @test */
    public function it_should_be_possible_to_define_the_tag(): void
    {
        // Arrange
        $expectedTag = 'ol';

        // Act
        $tag = $this->legend->ordered()->tag();

        // Assert
        $this->assertEquals($expectedTag, $tag);
    }
}
