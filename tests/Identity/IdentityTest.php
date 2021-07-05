<?php

namespace Maartenpaauw\Chartscss\Tests\Identity;

use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Tests\TestCase;
use Maartenpaauw\Chartscss\Types\Column;

class IdentityTest extends TestCase
{
    private Identity $identity;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identity = new Identity('my-chart', 'This is my chart.', new Column());
    }

    /** @test */
    public function it_should_return_the_description(): void
    {
        $this->assertEquals('This is my chart.', $this->identity->description());
    }

    /** @test */
    public function it_should_return_the_id(): void
    {
        $this->assertEquals('my-chart', $this->identity->id());
    }

    /** @test */
    public function it_should_return_the_type(): void
    {
        $this->assertEquals((new Column())->toString(), $this->identity->type()->toString());
    }
}
