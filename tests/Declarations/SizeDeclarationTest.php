<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\SizeDeclaration;

class SizeDeclarationTest extends DeclarationTest
{
    public function declaration(): DeclarationContract
    {
        return new SizeDeclaration(10, 100);
    }

    public function expectedString(): string
    {
        return '--size: calc(10 / 100);';
    }
}
