<?php

namespace Maartenpaauw\Chartscss;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\Colorscheme;
use Maartenpaauw\Chartscss\Appearance\Colorscheme\ColorschemeContract;
use Maartenpaauw\Chartscss\Appearance\Modifications;
use Maartenpaauw\Chartscss\Configuration\Configuration;
use Maartenpaauw\Chartscss\Configuration\ConfigurationContract;
use Maartenpaauw\Chartscss\Configuration\SmartConfiguration;
use Maartenpaauw\Chartscss\Configuration\Specifications\NeedsStartingPoint;
use Maartenpaauw\Chartscss\Data\Datasets\CalculatedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\DatasetsContract;
use Maartenpaauw\Chartscss\Data\Datasets\InvertedDatasets;
use Maartenpaauw\Chartscss\Data\Datasets\StartingPointDatasets;
use Maartenpaauw\Chartscss\Data\Specifications\IsStacked;
use Maartenpaauw\Chartscss\Identity\Identity;
use Maartenpaauw\Chartscss\Legend\Legend;
use Maartenpaauw\Chartscss\Types\ChartType;
use Maartenpaauw\Chartscss\Types\ChartTypeModificationAdapter;
use Maartenpaauw\Chartscss\Types\Column;
use Maartenpaauw\Specifications\NotSpecification;
use Maartenpaauw\Specifications\Specification;

abstract class Chart extends Component
{
    abstract protected function id(): string;

    abstract protected function heading(): string;

    abstract protected function datasets(): DatasetsContract;

    protected function tag(): string
    {
        return 'div';
    }

    protected function type(): ChartType
    {
        return new Column();
    }

    protected function legend(): Legend
    {
        return new Legend();
    }

    protected function modifications(): Modifications
    {
        return new Modifications([
            new ChartTypeModificationAdapter($this->type()),
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

    protected function displayLegendFirst(): bool
    {
        return false;
    }

    protected function identity(): Identity
    {
        return new Identity(
            $this->id(),
            $this->heading(),
            $this->type(),
        );
    }

    private function prepareDatasets(): DatasetsContract
    {
        $datasets = $this->datasets();

        /** @var Specification<DatasetsContract> $notStacked */
        $notStacked = new NotSpecification(new IsStacked());

        if ($notStacked->isSatisfiedBy($datasets)) {
            $datasets = new CalculatedDatasets($datasets);
        }

        if ((new NeedsStartingPoint())->isSatisfiedBy($this->configuration())) {
            $datasets = new InvertedDatasets(new StartingPointDatasets($datasets));
        }

        return $datasets;
    }

    public function render(): View
    {
        return view('charts-css::components.chart', [
            'id' => $this->identity()->id(),
            'tag' => $this->tag(),
            'configuration' => $this->configuration(),
            'datasets' => $this->prepareDatasets(),
            'displayLegendFirst' => $this->displayLegendFirst(),
        ]);
    }
}
