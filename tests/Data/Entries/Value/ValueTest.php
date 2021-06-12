<?php

namespace Maartenpaauw\Chart\Tests\Data\Entries\Value;

use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Declarations\ColorDeclaration;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Tests\TestCase;

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
}
