<?php

namespace Maartenpaauw\Chart\Tests\Appearance;

use Maartenpaauw\Chart\Appearance\Modification;
use Maartenpaauw\Chart\Tests\TestCase;

abstract class ModificationTest extends TestCase
{
    public abstract function modification(): Modification;

    public abstract function classes(): array;

    /** @test */
    public function it_should_collect_all_modifications_within_array(): void
    {
        $this->assertIsArray($this->modification()->classes());
        $this->assertEquals($this->classes(), $this->modification()->classes());
    }

}
