<?php

namespace Maartenpaauw\Chart\Tests\Types;

use Maartenpaauw\Chart\Tests\TestCase;
use Maartenpaauw\Chart\Types\ChartType;

abstract class ChartTypeTest extends TestCase
{
    abstract public function type(): ChartType;

    abstract public function string(): string;

    /** @test */
    public function it_should_convert_to_a_string_correctly(): void
    {
        $this->assertEquals($this->string(), $this->type()->toString());
    }

    /** @test */
    public function it_should_convert_to_a_modification_correctly(): void
    {
        // Act
        $modification = $this->type()->toModification();

        // Assert
        $this->assertContains($this->string(), $modification->classes());
        $this->assertCount(1, $modification->classes());
    }
}
