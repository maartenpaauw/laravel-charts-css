<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Data\Datasets;
use Maartenpaauw\Chart\Data\Specifications\HasMultiple;

class Chart extends Component
{
    public Datasets $datasets;

    public Configuration $configuration;

    public ModificationsBag $tableModifications;

    public function __construct(Datasets $datasets, Configuration $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
        $this->tableModifications = $configuration->modifications();

        if ((new HasHeading())->isSatisfiedBy($configuration)) {
            $this->tableModifications->add(new ShowHeading());
        }

        if ((new HasMultiple())->isSatisfiedBy($datasets)) {
            $this->tableModifications->add(new Multiple());
            $this->tableModifications->add(new ShowLabels());
        }
    }

    public function render(): View
    {
        return view('charts-css::components.chart');
    }
}
