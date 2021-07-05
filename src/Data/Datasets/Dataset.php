<?php

namespace Maartenpaauw\Chart\Data\Datasets;

use Maartenpaauw\Chart\Data\Entries\EntryContract;
use Maartenpaauw\Chart\Data\Label\AlignedLabel;
use Maartenpaauw\Chart\Data\Label\HiddenLabel;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Data\Label\NullLabel;

class Dataset implements DatasetContract
{
    private array $entries;

    private LabelContract $label;

    public function __construct(array $entries = [], ?LabelContract $label = null)
    {
        $this->entries = $entries;
        $this->label = $label ?? new NullLabel();
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
        return max(array_merge([0], array_map(fn(EntryContract $entry) => $entry->value()->raw(), $this->entries)));
    }

    public function hideLabel(): Dataset
    {
        return new self(
            $this->entries,
            new HiddenLabel($this->label),
        );
    }

    public function alignLabel(string $alignment): Dataset
    {
        return new self(
            $this->entries,
            new AlignedLabel($this->label, $alignment),
        );
    }
}
