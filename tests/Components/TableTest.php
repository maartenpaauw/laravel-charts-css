<?php

namespace Maartenpaauw\Chartscss\Tests\Components;

use Illuminate\View\Component;
use Illuminate\View\ComponentAttributeBag;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Components\Table;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Data\Axes\Axes;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\Dataset;
use Maartenpaauw\Chartscss\Data\Datasets\Datasets;
use Maartenpaauw\Chartscss\Data\Entries\Entry;
use Maartenpaauw\Chartscss\Data\Entries\Value\Value;
use Maartenpaauw\Chartscss\Data\Label\Label;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Tests\Snapshot\Driver\CustomHtmlDriver;
use Maartenpaauw\Chartscss\Types\Bar;

class TableTest extends AbstractComponentTest
{
    protected function component(): Component
    {
        $datasets = new Datasets(
            new Axes('Foo', ['A', 'B']),
            new Dataset([
                new Entry(new Value(1, '1k'), new Label('A')),
                new Entry(new Value(2, '2k'), new Label('B')),
            ]),
        );

        $configuration = new Configuration(
            new Identity('my-chart', 'This is my chart!', new Bar()),
            new Legend(),
            new Modifications(),
            new Colorscheme(),
        );

        return new Table(
            new CalculatedDatasets($datasets),
            $configuration,
        );
    }

    protected function render(): string
    {
        return $this->component()
            ->render()
            ->with('attributes', new ComponentAttributeBag())
            ->toHtml();
    }
}
