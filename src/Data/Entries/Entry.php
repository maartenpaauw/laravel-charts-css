<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\Label;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    public function __construct(ValueContract $value, ?LabelContract $label = null)
    {
        $this->value = $value;
        $this->label = $label ?? new Label('');
    }

    public function value(): ValueContract
    {
        return $this->value;
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function declarations(): Declarations
    {
        return $this->value->declarations();
    }

    public function color(ColorContract $color): Entry
    {
        return new self(
            new Value(
                $this->value->raw(),
                $this->value->display(),
                $this->value->declarations()->add($color->declaration()),
            ),
            $this->label,
        );
    }

    public function start(float $value): Entry
    {
        return new self(
            new Value(
                $this->value->raw(),
                $this->value->display(),
                $this->value->declarations()->add(new StartDeclaration($value, 1)),
            ),
            $this->label,
        );
    }

    public function hideLabel(): Entry
    {
        return new self(
            $this->value,
            $this->label->hide(),
        );
    }

    public function alignLabel(string $alignment): Entry
    {
        return new self(
            $this->value,
            $this->label->align($alignment),
        );
    }
}
