<?php

namespace Maartenpaauw\Chart\Tests\Configuration;

use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Tests\TestCase;

class ConfigurationTest extends TestCase
{
    private Configuration $configuration;

    protected function setUp(): void
    {
        parent::setUp();

        $this->configuration = new Configuration();
    }

    /** @test */
    public function it_should_return_the_default_id_correctly(): void
    {
        $this->assertEquals('my-chart', $this->configuration->id());
    }

    /** @test */
    public function it_should_return_the_default_heading_correctly(): void
    {
        $this->assertEquals('This is my first chart', $this->configuration->heading());
    }

    /** @test */
    public function it_legend(): void
    {
        // Arrange
        $labels = [
            'Label 1',
            'Label 2',
            'Label 3',
        ];

        // Act
        $legend = $this->configuration->legend();

        // Assert
        $this->assertEquals($labels, $legend->labels);
    }
}
