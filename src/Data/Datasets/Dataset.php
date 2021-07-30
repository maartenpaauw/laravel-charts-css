<?php

namespace Maartenpaauw\Chartscss\Data\Datasets;

use Maartenpaauw\Chartscss\Data\Entries\EntryContract;
use Maartenpaauw\Chartscss\Data\Label\AlignedLabel;
use Maartenpaauw\Chartscss\Data\Label\HiddenLabel;
use Maartenpaauw\Chartscss\Data\Label\LabelContract;
use Maartenpaauw\Chartscss\Data\Label\NullLabel;

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

    public function add(EntryContract $entry): self
    {
        return new self(
            array_merge($this->entries, [$entry]),
            $this->label,
        );
    }

    public function hideLabel(): self
    {
        return new self(
            $this->entries,
            new HiddenLabel($this->label),
        );
    }

    public function alignLabel(string $alignment): self
    {
        return new self(
            $this->entries,
            new AlignedLabel($this->label, $alignment),
        );
    }
}
