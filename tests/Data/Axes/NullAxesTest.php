<?php

namespace Maartenpaauw\Chart\Tests\Data\Axes;

use Maartenpaauw\Chart\Data\Axes\AxesContract;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Tests\TestCase;

class NullAxesTest extends TestCase
{
    private AxesContract $nullAxes;

    protected function setUp(): void
    {
        parent::setUp();

        $this->nullAxes = new NullAxes();
    }

    /** @test */
    public function it_should_return_an_empty_string_as_primary_axis(): void
    {
        $this->assertEmpty($this->nullAxes->primary());
    }

    /** @test */
    public function it_should_return_an_array_with_an_empty_string_as_data_axis(): void
    {
        // Act
        $data = $this->nullAxes->data();

        // Assert
        $this->assertContains('', $data);
        $this->assertCount(1, $data);
    }
}
