<?php

namespace Maartenpaauw\Chart\Data\Entries;

use Maartenpaauw\Chart\Appearance\Colorscheme\ColorContract;
use Maartenpaauw\Chart\Data\Entries\Value\Value;
use Maartenpaauw\Chart\Data\Entries\Value\ValueContract;
use Maartenpaauw\Chart\Data\Label\AlignedLabel;
use Maartenpaauw\Chart\Data\Label\HiddenLabel;
use Maartenpaauw\Chart\Data\Label\LabelContract;
use Maartenpaauw\Chart\Data\Label\NullLabel;
use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

class Entry implements EntryContract
{
    private ValueContract $value;

    private LabelContract $label;

    public function __construct(ValueContract $value, ?LabelContract $label = null)
    {
        $this->value = $value;
        $this->label = $label ?? new NullLabel();
    }

    public function value(): ValueContract
    {
        return $this->value;
    }

    public function label(): LabelContract
    {
        return $this->label;
    }

    public function color(ColorContract $color): Entry
    {
        return $this->withDeclaration($color->declaration());
    }

    public function start(float $value): Entry
    {
        return $this->withDeclaration(new StartDeclaration($value, 1));
    }

    private function withDeclaration(DeclarationContract $declaration): Entry
    {
        $declarations = $this->value
            ->declarations()
            ->add($declaration);

        return new self(
            new Value(
                $this->value->raw(),
                $this->value->display(),
                $declarations,
            ),
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
