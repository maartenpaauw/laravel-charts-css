<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Entries\Tooltip\NullTooltip;
use Maartenpaauw\Chart\Data\Entries\Tooltip\TooltipContract;
use Maartenpaauw\Chart\Data\Entries\Value\ColorfulValue;
use Maartenpaauw\Chart\Data\Entries\Value\StartValue;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\AlignedLabel;
use Maartenpaauw\Chart\Data\Label\HiddenLabel;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Data\Label\NullLabel;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    private TooltipContract $tooltip;

    public function __construct(ValueContract $value, ?LabelContract $label = null, ?TooltipContract $tooltip = null)
    {
        $this->value = $value;
        $this->label = $label ?? new NullLabel();
        $this->tooltip = $tooltip ?? new NullTooltip();
    }

    public function value(): ValueContract
    {
        return $this->value;
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function tooltip(): TooltipContract
    {
        return $this->tooltip;
    }

    public function color(ColorContract $color): Entry
    {
        return new self(
            new ColorfulValue($this->value, $color),
            $this->label,
        );
    }

    public function start(float $start): Entry
    {
        return new self(
            new StartValue($this->value, $start),
            $this->label,
        );
    }

    public function hideLabel(): Entry
    {
        return new self(
            $this->value,
            new HiddenLabel($this->label),
        );
    }

    public function alignLabel(string $alignment): Entry
    {
        return new self(
            $this->value,
            new AlignedLabel($this->label, $alignment),
        );
    }
}
