<?php

namespace Maartenpaauw\Chart\Tests\Identity;

use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Tests\TestCase;

class IdentityTest extends TestCase
{
    private Identity $identity;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identity = new Identity('This is my chart.', 'my-chart');
    }

    /** @test */
    public function it_should_return_the_description(): void
    {
        $this->assertEquals('This is my chart.', $this->identity->description());
    }

    /** @test */
    public function it_should_convert_it_to_a_string_correctly(): void
    {
        $this->assertEquals('my-chart', $this->identity->toString());
    }
}
