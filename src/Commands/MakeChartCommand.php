<?php

namespace Maartenpaauw\Chart\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeChartCommand extends GeneratorCommand
{
    protected $name = 'make:chart';

    protected $description = 'Create a new chart class';

    protected function getDefaultNamespace($rootNamespace): string
    {
        if ($this->isCustomNamespace()) {
            return $rootNamespace;
        }

        return sprintf('%s\View\Components', $rootNamespace);
    }

    protected function getStub(): string
    {
        return sprintf('%s/../../stubs/chart.stub', __DIR__);
    }


    protected function replaceClass($stub, $name): string
    {
        return Str::replace(
            ['dummy-id', 'Dummy Heading'],
            [$this->id(), $this->heading()],
            parent::replaceClass($stub, $name),
        );
    }

    private function id(): string
    {
        return Str::kebab($this->className());
    }

    private function heading(): string
    {
        return trim(implode(' ', preg_split('/(?=[A-Z])/', $this->className())));
    }

    private function className(): string
    {
        return Str::afterLast($this->getNameInput(), '/');
    }

    private function isCustomNamespace(): bool
    {
        return Str::contains($this->getNameInput(), '/');
    }
}
