<?php

namespace Maartenpaauw\Chart\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Maartenpaauw\Chart\Appearance\ModificationsBag;
use Maartenpaauw\Chart\Appearance\Multiple;
use Maartenpaauw\Chart\Appearance\ShowHeading;
use Maartenpaauw\Chart\Appearance\ShowLabels;
use Maartenpaauw\Chart\Configuration\Configuration;
use Maartenpaauw\Chart\Configuration\Specifications\HasColorscheme;
use Maartenpaauw\Chart\Configuration\Specifications\HasHeading;
use Maartenpaauw\Chart\Configuration\Specifications\HasLabels;
use Maartenpaauw\Chart\Data\DatasetsContract;
use Maartenpaauw\Chart\Data\Specifications\HasMultiple;

class Chart extends Component
{
    public DatasetsContract $datasets;

    public Configuration $configuration;

    public ModificationsBag $tableModifications;

    public bool $hasHeading;

    public bool $hasColorscheme;

    public bool $hasLabels;

    public function __construct(DatasetsContract $datasets, Configuration $configuration)
    {
        $this->datasets = $datasets;
        $this->configuration = $configuration;
        $this->tableModifications = $configuration->modifications();

        $this->hasColorscheme = (new HasColorscheme())->isSatisfiedBy($this->configuration);
        $this->hasHeading = (new HasHeading())->isSatisfiedBy($this->configuration);
        $this->hasLabels = (new HasLabels())->isSatisfiedBy($this->configuration);

        if ($this->hasHeading) {
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
