<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\compose;

final class ComposeTest extends TestCase
{
    public function testCompose(): void
    {
        $callable1 = function ($arg0) {
            return $arg0 + 1;
        };

        $callable2 = function ($arg0) {
            return $arg0 + 1;
        };

        $composedFunctions = compose($callable1, $callable2);
        $this->assertEquals(2, $composedFunctions(0));
    }

    public function testAssociativity(): void
    {
        $add = function ($arg0): callable {
            return function ($arg1) use ($arg0) {
                return $arg0 + $arg1;
            };
        };

        $composed0 = compose($add(5), compose($add(20), $add(50)));
        $composed1 = compose(compose($add(5), $add(20)), $add(50));

        $this->assertSame($composed0(0), $composed1(0));
    }
}
