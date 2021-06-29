<?php

namespace Maartenpaauw\Chart\Declarations;

class LabelAlignmentDeclaration implements DeclarationContract
{
    private string $alignment;

    public function __construct(string $alignment)
    {
        $this->alignment = $alignment;
    }

    public function toString(): string
    {
        return "--labels-align: {$this->alignment};";
    }
}
