<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Tests\TestCase;

abstract class DeclarationTest extends TestCase
{
    abstract public function declaration(): DeclarationContract;

    abstract public function expectedString(): string;

    /** @test */
    public function it_should_be_possible_to_convert_it_to_a_string(): void
    {
        $this->assertEquals($this->expectedString(), $this->declaration()->toString());
    }
}
