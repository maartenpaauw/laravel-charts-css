<?php

namespace Maartenpaauw\Chartscss\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

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
            ['dummy-id', 'Dummy Heading', 'DummyType'],
            [$this->id(), $this->heading(), $this->type()],
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

    public function type(): string
    {
        if ($this->option('type') === 'column') {
            return 'Chart';
        }

        return sprintf('%sChart', ucfirst($this->option('type')));
    }

    protected function getOptions(): array
    {
        return [
            ['type', 't', InputOption::VALUE_OPTIONAL, 'The chart type to use', 'column'],
        ];
    }
}
