<?php

namespace Maartenpaauw\Chart\Tests\Declarations;

use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\RowColorDeclaration;
use Maartenpaauw\Chart\Tests\TestCase;

class DeclarationsTest extends TestCase
{
    private Declarations $declarations;

    protected function setUp(): void
    {
        parent::setUp();

        $this->declarations = new Declarations([
            new RowColorDeclaration('red', 1),
            new RowColorDeclaration('green', 2),
        ]);
    }

    /** @test */
    public function it_should_be_possible_to_add_a_declaration(): void
    {
        // Arrange
        $exectedString = '--color-1: red; --color-2: green; --color-3: blue;';

        // Act
        $declarations = $this->declarations->add(new RowColorDeclaration('blue', 3));

        // Assert
        $this->assertEquals($exectedString, $declarations->toString());
    }

    /** @test */
    public function it_should_be_possible_to_convert_it_to_a_string(): void
    {
        // Arrange
        $expectedString = '--color-1: red; --color-2: green;';

        // Act
        $string = $this->declarations->toString();

        // Assert
        $this->assertEquals($expectedString, $string);
    }

    /** @test */
    public function it_should_be_possible_to_convert_it_to_an_array(): void
    {
        // Arrange
        $expectedCount = 2;

        // Act
        [$red, $green] = $array = $this->declarations->toArray();

        // Assert
        $this->assertCount($expectedCount, $array);
        $this->assertInstanceOf(RowColorDeclaration::class, $red);
        $this->assertInstanceOf(RowColorDeclaration::class, $green);
    }

    /** @test */
    public function it_should_be_possible_to_merge_two_declarations(): void
    {
        // Arrange
        $exectedString = '--color-1: red; --color-2: green; --color-3: blue;';
        $myDeclarations = new Declarations([
            new RowColorDeclaration('blue', 3),
        ]);

        // Act
        $declarations = $this->declarations->merge($myDeclarations);

        // Assert
        $this->assertCount(3, $declarations->toArray());
        $this->assertEquals($exectedString, $declarations->toString());
    }
}
