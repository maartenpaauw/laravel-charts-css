<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Label;

use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use PHPUnit\Framework\TestCase;

class LabelTest extends TestCase
{
    private LabelContract $label;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label = new Label('Value #1', new ModificationsBag());
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
    public function it_should_be_possible_to_receive_the_modifications_bag(): void
    {
        // Act
        $modifications = $this->label->modifications();

        // Assert
        $this->assertEmpty($modifications->toArray());
    }

    /** @test */
    public function it_should_be_possible_to_hide_the_label(): void
    {
        // Arrange
        $expectedClass = 'hide-label';

        // Act
        $this->label->hide();

        $array = $this->label->modifications()->toArray();
        $classes = $this->label->modifications()->classes();

        // Assert
        $this->assertCount(1, $array);
        $this->assertContains($expectedClass, $classes);
    }

    /** @test */
    public function it_should_create_an_empty_modifications_bag_when_it_is_not_specified(): void
    {
        // Arrange
        $label = new Label('A');

        // Act
        $modifications = $label->modifications();

        // Assert
        $this->assertEmpty($modifications->toArray());
    }
}
