<?php

namespace Maartenpaauw\Chart\Tests\Legend;

use Maartenpaauw\Chart\Legend\Appearance;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;

class LegendTest extends TestCase
{
    private array $labels;

    private Appearance $appearance;

    private Legend $legend;

    protected function setUp(): void
    {
        parent::setUp();

        $this->labels = ['Label A', 'Label B', 'Label C'];
        $this->appearance = new Appearance();
        $this->legend = new Legend($this->labels, $this->appearance);
    }

    /** @test */
    public function it_should_be_possible_to_access_the_labels(): void
    {
        $this->assertCount(3, $this->legend->labels);
        $this->assertEquals($this->labels, $this->legend->labels);
    }

    /** @test */
    public function it_should_be_possible_to_access_the_appearance(): void
    {
        $this->assertEquals($this->appearance, $this->legend->appearance);
    }
}
