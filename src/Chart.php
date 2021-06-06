<?php

namespace Maartenpaauw\Chart;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chart\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\ConfigurationContract;
use Maartenpaauw\Chart\Configuration\SmartConfiguration;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Configuration\Specifications\NeedsStartingPoint;
use Maartenpaauw\Chart\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chart\Data\Datasets\StartingPointDatasets;
use Maartenpaauw\Chart\Identity\Identity;
use Maartenpaauw\Chart\Legend\Legend;
use Maartenpaauw\Chart\Types\ChartType;
use Maartenpaauw\Chart\Types\Column;

abstract class Chart extends Component
{
    abstract protected function id(): string;

    abstract protected function heading(): string;

    abstract protected function datasets(): DatasetsContract;

    protected function type(): ChartType
    {
        return new Column();
    }

    protected function legend(): Legend
    {
        return new Legend();
    }

    protected function modifications(): ModificationsBag
    {
        return new ModificationsBag([
            $this->type()->toModification(),
        ]);
    }

    protected function colorscheme(): ColorschemeContract
    {
        return new Colorscheme();
    }

    protected function configuration(): ConfigurationContract
    {
        return new SmartConfiguration(
            new Configuration(
                $this->identity(),
                $this->legend(),
                $this->modifications(),
                $this->colorscheme(),
            ),
            $this->datasets(),
        );
    }

    private function identity(): Identity
    {
        return new Identity(
            $this->id(),
            $this->heading(),
            $this->type(),
        );
    }

    private function prepareDatasets(): DatasetsContract
    {
        if ((new NeedsStartingPoint())->isSatisfiedBy($this->configuration())) {
            return new StartingPointDatasets($this->datasets());
        }

        return $this->datasets();
    }

    public function render(): View
    {
        return view('charts-css::components.chart', [
            'configuration' => $this->configuration(),
            'datasets' => $this->prepareDatasets(),
            'hasColorscheme' => (new HasColorscheme())->isSatisfiedBy($this->configuration()),
            'hasHeading' => (new HasHeading())->isSatisfiedBy($this->configuration()),
            'hasLabels' => (new HasLabels())->isSatisfiedBy($this->configuration()),
        ]);
    }
}
