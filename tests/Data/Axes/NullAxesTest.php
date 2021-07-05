<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Axes;

use Maartenpaauw\Chartscss\Data\Axes\AxesContract;
use Maartenpaauw\Chartscss\Data\Axes\NullAxes;
use Maartenpaauw\Chartscss\Tests\TestCase;

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
    public function it_should_return_an_empty_array_as_data_axis(): void
    {
        // Act
        $data = $this->nullAxes->data();

        // Assert
        $this->assertEmpty($data);
    }
}
