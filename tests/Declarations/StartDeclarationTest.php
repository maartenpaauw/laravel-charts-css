<?php

namespace Maartenpaauw\Chartscss\Tests\Declarations;

use Maartenpaauw\Chartscss\Declarations\DeclarationContract;
use Maartenpaauw\Chartscss\Declarations\StartDeclaration;

class StartDeclarationTest extends DeclarationTest
{
    public function declaration(): DeclarationContract
    {
        return new StartDeclaration(10, 100);
    }

    public function expectedString(): string
    {
        return '--start: calc(10 / 100);';
    }
}
