<?php

namespace Maartenpaauw\Chart\Tests\Declarations;

use Maartenpaauw\Chart\Declarations\DeclarationContract;
use Maartenpaauw\Chart\Declarations\StartDeclaration;

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
