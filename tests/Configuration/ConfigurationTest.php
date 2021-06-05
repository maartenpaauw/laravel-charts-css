<?php

namespace Maartenpaauw\Chart\Tests\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Tests\TestCase;

class ConfigurationTest extends TestCase
{
    private Identity $identity;

    private Legend $legend;

    private ModificationsBag $modifications;

    private Configuration $configuration;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $this->identity = new Identity('My chart', 'my-chart');
        $this->legend = new Legend();
        $this->modifications = new ModificationsBag();
        $this->colorscheme = new Colorscheme();

        $this->configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );
    }

    /** @test */
    public function it_can_access_the_identity(): void
    {
        $this->assertEquals($this->identity, $this->configuration->identity());
    }

    /** @test */
    public function it_can_access_the_legend(): void
    {
        $this->assertEquals($this->legend, $this->configuration->legend());
    }

    /** @test */
    public function it_can_access_the_modifications(): void
    {
        $this->assertEquals($this->modifications, $this->configuration->modifications());
    }

    /** @test */
    public function it_can_access_the_colorscheme(): void
    {
        $this->assertEquals($this->colorscheme, $this->configuration->colorscheme());
    }
}
