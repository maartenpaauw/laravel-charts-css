<?php

namespace Maartenpaauw\Chartscss\Tests\Appearance;

use Maartenpaauw\Chartscss\Appearance\Modification;
use Maartenpaauw\Chartscss\Tests\TestCase;

abstract class ModificationTest extends TestCase
{
    abstract public function modification(): Modification;

    /**
     * @return string[]
     */
    abstract public function classes(): array;

    /** @test */
    public function it_should_collect_all_modifications_within_array(): void
    {
        $this->assertIsArray($this->modification()->classes());
        $this->assertEquals($this->classes(), $this->modification()->classes());
    }
}
