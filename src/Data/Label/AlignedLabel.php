<?php

namespace Maartenpaauw\Chart\Data\Label;

use Maartenpaauw\Chart\Appearance\Modifications;
use Maartenpaauw\Chart\Declarations\Declarations;
use Maartenpaauw\Chart\Declarations\LabelAlignmentDeclaration;

class AlignedLabel implements LabelContract
{
    private LabelContract $origin;

    private string $alignment;

    public function __construct(LabelContract $origin, string $alignment)
    {
        $this->origin = $origin;
        $this->alignment = $alignment;
    }

    public function value(): string
    {
        return $this->origin->value();
    }

    public function modifications(): Modifications
    {
        return $this->origin->modifications();
    }

    public function declarations(): Declarations
    {
        return $this->origin
            ->declarations()
            ->add(new LabelAlignmentDeclaration($this->alignment));
    }
}
