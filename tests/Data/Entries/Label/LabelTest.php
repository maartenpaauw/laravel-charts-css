<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Label;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Tests\TestCase;

class LabelTest extends TestCase
{
    private LabelContract $label;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new Label('Value #1', new Modifications());
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_value(): void
    {
        // Arrange
        $expectedValue = 'Value #1';

        // Act
        $value = $this->label->value();

        // Assert
        $this->assertEquals($expectedValue, $value);
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_modifications(): void
    {
        // Act
        $modifications = $this->label->modifications();

        // Assert
        $this->assertEmpty($modifications->toArray());
    }

    /** @test */
    public function it_should_create_an_empty_modifications_instance_when_it_is_not_specified(): void
    {
        // Arrange
        $label = new Label('A');

        // Act
        $modifications = $label->modifications();

        // Assert
        $this->assertEmpty($modifications->toArray());
    }
}
