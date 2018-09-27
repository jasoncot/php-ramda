<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\apply;

final class ApplyTest extends TestCase
{
    public function testApplyBaseCase(): void
    {
        $testFunction = function ($arg0, $arg1) {
            return $arg0 + $arg1;
        };
        $this->assertEquals(0, apply($testFunction, [0, 0]));
        $this->assertEquals(0, apply($testFunction, [1, -1]));
        $this->assertEquals(0, apply($testFunction, [2, -2]));

        $this->assertEquals(1, apply($testFunction, [1, 0]));
        $this->assertEquals(2, apply($testFunction, [1, 1]));
        $this->assertEquals(3, apply($testFunction, [1, 2]));

        $this->assertEquals(0, apply($testFunction, [0, 0]));
        $this->assertEquals(0, apply($testFunction, [1, -1]));
        $this->assertEquals(0, apply($testFunction, [2, -2]));
    }
}
