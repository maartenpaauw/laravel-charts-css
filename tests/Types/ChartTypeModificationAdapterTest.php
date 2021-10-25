<?php

namespace Maartenpaauw\Chartscss\Tests\Types;

use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Area;
use Maartenpaauw\Chartscss\Types\Bar;
use Maartenpaauw\Chartscss\Types\ChartType;
use Maartenpaauw\Chartscss\Types\ChartTypeModificationAdapter;
use Maartenpaauw\Chartscss\Types\Column;
use Maartenpaauw\Chartscss\Types\Line;

class ChartTypeModificationAdapterTest extends TestCase
{
    /**
     * @test
     * @dataProvider chartTypesDataProvider
     */
    public function it_should_convert_a_chart_type_to_a_modification_correctly(ChartType $chart, string $class): void
    {
        // Arrange
        $modification = new ChartTypeModificationAdapter($chart);

        // Act
        $classes = $modification->classes();

        // Assert
        $this->assertContains($class, $classes);
        $this->assertCount(1, $classes);
    }

    public function chartTypesDataProvider(): array
    {
        return [
            'area' => [new Area(), 'area'],
            'bar' => [new Bar(), 'bar'],
            'column' => [new Column(), 'column'],
            'line' => [new Line(), 'line'],
        ];
    }
}
