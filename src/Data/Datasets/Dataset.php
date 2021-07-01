<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\Entry;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;

class Dataset implements DatasetContract
{
    private array $entries;

    private LabelContract $label;

    public function __construct(array $entries = [], ?LabelContract $label = null)
    {
        $this->entries = $entries;
        $this->label = $label ?? new Label('');
    }

    public function entries(): array
    {
        return $this->entries;
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function max(): float
    {
        return max(array_map(fn (Entry $entry) => $entry->value()->raw(), $this->entries));
    }

    public function hideLabel(): Dataset
    {
        return new self(
            $this->entries,
            $this->label->hide(),
        );
    }

    public function alignLabel(string $alignment): Dataset
    {
        return new self(
            $this->entries,
            $this->label->align($alignment),
        );
    }
}
