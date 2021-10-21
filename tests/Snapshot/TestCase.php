<?php

namespace Maartenpaauw\Chartscss\Tests\Snapshot;

use Maartenpaauw\Chartscss\Tests\TestCase as BaseTestCase;
use Spatie\Snapshots\MatchesSnapshots;

abstract class TestCase extends BaseTestCase
{
    use MatchesSnapshots;
}
