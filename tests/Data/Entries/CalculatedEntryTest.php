<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\Color;
use Maartenpaauw\Chart\Data\Entries\CalculatedEntry;
use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Tests\TestCase;

class CalculatedEntryTest extends TestCase
{
    private EntryContract $origin;

    private EntryContract $calculatedEntry;

    protected function setUp(): void
    {
        parent::setUp();

        $this->origin = new Entry(new Value(10));
        $this->calculatedEntry = new CalculatedEntry(
            $this->origin,
            30,
        );
    }

    /** @test */
    public function it_should_return_the_origin_value(): void
    {
        $this->assertEquals($this->origin->value(), $this->calculatedEntry->value());
    }

    /** @test */
    public function it_should_return_the_origin_raw(): void
    {
        $this->assertEquals($this->origin->raw(), $this->calculatedEntry->raw());
    }

    /** @test */
    public function it_should_add_the_given_color_to_its_origin_declarations_bag(): void
    {
        // Arrange
        $color = new Color('red');

        // Act
        $this->calculatedEntry->color($color);

        // Assert
        $this->assertEquals('--color: red;', $this->origin->declarations()->toString());
    }

    /** @test */
    public function it_should_add_the_size_declaration_correctly(): void
    {
        // Act
        $declarations = $this->calculatedEntry->declarations();

        // Assert
        $this->assertStringContainsString('--size: calc(10 / 30);', $declarations->toString());
    }

    /** @test */
    public function it_should_return_the_origin_label(): void
    {
        $this->assertEquals($this->origin->label(), $this->calculatedEntry->label());
    }

    /** @test */
    public function it_should_modify_the_origin_label_when_hiding_it(): void
    {
        // Act
        $this->calculatedEntry->hideLabel();
        $modifications = $this->origin->label()->modifications();

        // Assert
        $this->assertCount(1, $modifications->toArray());
        $this->assertContains('hide-label', $modifications->classes());
    }
}
