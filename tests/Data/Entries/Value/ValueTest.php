<?php

namespace Maartenpaauw\Chartscss\Tests\Data\Entries\Value;

use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chartscss\Declarations\ColorDeclaration;
use Maartenpaauw\Chartscss\Declarations\Declarations;
use Maartenpaauw\Chartscss\Tests\TestCase;

class ValueTest extends TestCase
{
    private ValueContract $value;

    protected function setUp(): void
    {
        parent::setUp();

        $this->value = new Value(10000, '10k', new Declarations([
            new ColorDeclaration('red'),
        ]));
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_given_raw_value(): void
    {
        // Arrange
        $expectedRaw = 10000;

        // Act
        $raw = $this->value->raw();

        // Assert
        $this->assertEquals($expectedRaw, $raw);
    }

    /** @test */
    public function it_should_be_possible_the_receive_the_given_display(): void
    {
        // Arrange
        $expectedDisplay = '10k';

        // Act
        $display = $this->value->display();

        // Assert
        $this->assertEquals($expectedDisplay, $display);
    }

    /** @test */
    public function it_should_be_possible_to_receive_the_given_declarations(): void
    {
        // Arrange
        $expectedCount = 1;

        // Act
        $declarations = $this->value->declarations();

        // Assert
        $this->assertCount($expectedCount, $declarations->toArray());
    }

    /** @test */
    public function it_should_use_the_raw_value_as_display_when_no_specific_display_is_given(): void
    {
        // Arrange
        $value = new Value(10);

        // Act
        $display = $value->display();

        // Assert
        $this->assertEquals('10', $display);
    }

    /** @test */
    public function it_should_create_an_empty_declarations_container_when_it_is_not_specified(): void
    {
        // Arrange
        $value = new Value(10);

        // Act
        $declarations = $value->declarations();

        // Assert
        $this->assertEmpty($declarations->toArray());
    }
}
