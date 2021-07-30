<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\InvertedDatasets;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Tests\TestCase;

class InvertedDatasetsTest extends TestCase
{
    private DatasetsContract $datasets;

    private DatasetsContract $invertedDatasets;

    protected function setUp(): void
    {
        $this->datasets = new Datasets(
            new NullAxes(),
            new Dataset(),
        );

        $this->invertedDatasets = new InvertedDatasets($this->datasets);

        parent::setUp();
    }

    /** @test */
    public function it_should_return_the_origin_axes(): void
    {
        $this->assertEquals($this->datasets->axes(), $this->invertedDatasets->axes());
    }

    /** @test */
    public function it_should_not_touch_the_datasets_when_only_one_is_passed(): void
    {
        $this->assertEquals($this->datasets->toArray(), $this->invertedDatasets->toArray());
    }

    /** @test */
    public function it_should_inverse_the_origin_datasets_correctly(): void
    {
        // Arrange
        $expectedA1 = new Entry(new Value(0.5, '50'));
        $expectedA2 = new Entry(new Value(0.2, '20'));
        $expectedA3 = new Entry(new Value(0.4, '40'));

        $expectedB1 = new Entry(new Value(0.8, '80'));
        $expectedB2 = new Entry(new Value(0.5, '50'));
        $expectedB3 = new Entry(new Value(0.1, '10'));

        $expectedC1 = new Entry(new Value(0.4, '40'));
        $expectedC2 = new Entry(new Value(0.3, '30'));
        $expectedC3 = new Entry(new Value(0.2, '20'));

        $invertedDatasets = new InvertedDatasets(
            new Datasets(
                new NullAxes(),
                new Dataset([$expectedA1, $expectedB1, $expectedC1]),
                new Dataset([$expectedA2, $expectedB2, $expectedC2]),
                new Dataset([$expectedA3, $expectedB3, $expectedC3]),
            ),
        );

        // Act
        [$a, $b, $c] = $datasets =  $invertedDatasets->toArray();
        [$a1, $a2, $a3] = $a->entries();
        [$b1, $b2, $b3] = $b->entries();
        [$c1, $c2, $c3] = $c->entries();

        // Assert
        $this->assertCount(3, $datasets);
        $this->assertCount(3, $a->entries());
        $this->assertCount(3, $b->entries());
        $this->assertCount(3, $c->entries());

        $this->assertEquals($expectedA1, $a1);
        $this->assertEquals($expectedA2, $a2);
        $this->assertEquals($expectedA3, $a3);

        $this->assertEquals($expectedB1, $b1);
        $this->assertEquals($expectedB2, $b2);
        $this->assertEquals($expectedB3, $b3);

        $this->assertEquals($expectedC1, $c1);
        $this->assertEquals($expectedC2, $c2);
        $this->assertEquals($expectedC3, $c3);
    }
}
