<?php

namespace Maartenpaauw\Chart\Tests\Configuration;

use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\SmartConfiguration;
use Maartenpaauw\Chart\Data\Axes\NullAxes;
use Maartenpaauw\Chart\Data\Datasets\Dataset;
use Maartenpaauw\Chart\Data\Datasets\Datasets;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Types\Column;
use PHPUnit\Framework\TestCase;

class SmartConfigurationTest extends TestCase
{
    private ConfigurationContract $configuration;

    private ConfigurationContract $smartConfiguration;

    private Identity $identity;

    private Legend $legend;

    private ModificationsBag $modifications;

    private ColorschemeContract $colorscheme;

    protected function setUp(): void
    {
        parent::setUp();

        $datasets = new Datasets(new NullAxes(), [
            new Dataset([], 'Dataset 1'),
            new Dataset([], 'Dataset 2'),
        ]);

        $this->identity = new Identity('my-chart', 'My chart', new Column());
        $this->legend = new Legend();
        $this->modifications = new ModificationsBag();
        $this->colorscheme = new Colorscheme();

        $this->configuration = new Configuration(
            $this->identity,
            $this->legend,
            $this->modifications,
            $this->colorscheme,
        );

        $this->smartConfiguration = new SmartConfiguration($this->configuration, $datasets);
    }

    /** @test */
    public function it_should_return_the_origin_identity(): void
    {
        $this->assertEquals($this->configuration->identity(), $this->smartConfiguration->identity());
        $this->assertEquals($this->identity, $this->smartConfiguration->identity());
    }

    /** @test */
    public function it_should_return_the_origin_legend(): void
    {
        $this->assertEquals($this->configuration->legend(), $this->smartConfiguration->legend());
        $this->assertEquals($this->legend, $this->smartConfiguration->legend());
    }

    /** @test */
    public function it_should_return_the_origin_colorscheme(): void
    {
        $this->assertEquals($this->configuration->colorscheme(), $this->smartConfiguration->colorscheme());
        $this->assertEquals($this->colorscheme, $this->smartConfiguration->colorscheme());
    }

    /** @test */
    public function it_should_have_the_show_heading_modification_when_the_heading_is_configured(): void
    {
        // Arrange
        $expectedClass = 'show-heading';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_multiple_modification_when_there_are_multiple_datasets_configured(): void
    {
        // Arrange
        $expectedClass = 'multiple';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_the_show_labels_modification_when_there_are_multiple_datasets_configured(): void
    {
        // Arrange
        $expectedClass = 'show-labels';

        // Assert
        $this->assertContains($expectedClass, $this->smartConfiguration->modifications()->classes());
        $this->assertNotContains($expectedClass, $this->configuration->modifications()->classes());
    }

    /** @test */
    public function it_should_have_three_modifications_automatically_added(): void
    {
        $this->assertCount(0, $this->configuration->modifications()->toArray());
        $this->assertCount(3, $this->smartConfiguration->modifications()->toArray());
    }
}