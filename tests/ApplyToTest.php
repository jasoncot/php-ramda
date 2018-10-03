<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\applyTo;

final class ApplyToTest extends TestCase
{
    public function testBaseCase(): void
    {
        $unaryCallback = function ($input) {
            return strtoupper($input);
        };

        $shout = applyTo('test_string', $unaryCallback);
        $this->assertEquals('TEST_STRING', $shout);
    }
}
