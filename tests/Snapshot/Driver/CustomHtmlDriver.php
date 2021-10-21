<?php

namespace Maartenpaauw\Chartscss\Tests\Snapshot\Driver;

use PHPUnit\Framework\Assert;
use Spatie\Snapshots\Driver;

class CustomHtmlDriver implements Driver
{
    public function serialize($data): string
    {
        return tidy_repair_string($data, [
            'indent' => true,
            'indent-spaces' => 4,
            'show-body-only' => true,
            'wrap' => 0,
        ]);
    }

    public function extension(): string
    {
        return 'html';
    }

    public function match($expected, $actual): void
    {
        Assert::assertEquals(
            trim($expected),
            trim($this->serialize($actual)),
        );
    }
}
