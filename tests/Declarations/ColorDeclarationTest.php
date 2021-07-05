<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\ColorDeclaration;
use Maartenpaauw\Chartscss\Declarations\DeclarationContract;

class ColorDeclarationTest extends DeclarationTest
{
    public function declaration(): DeclarationContract
    {
        return new ColorDeclaration('rgba(255, 0, 0, 0, 0.5)');
    }

    public function expectedString(): string
    {
        return '--color: rgba(255, 0, 0, 0, 0.5);';
    }
}
