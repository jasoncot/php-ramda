<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\add;
use function PHRamda\curryN;

final class CurryNTest extends TestCase
{
    public function testCurryN(): void
    {
        $curriedAdd = curryN(2, add());
        $add5 = $curriedAdd(5);
        $this->assertEquals(5, $add5(0));
    }

    public function testCurryWithValues(): void
    {
        $add5 = curryN(1, add(5));
        $this->assertEquals(5, $add5(0));
    }

    public function testCurryUnhappyPath(): void
    {
        $curriedAdd = curryN(
            0, 
            function ($arg0, $arg1) {
                return $arg0 + $arg1;
            }
        );
        try {
            $add5 = $curriedAdd(5);
            $this->fail('Should not have successfully called without enough arguembts');
        } catch (\ArgumentCountError $er) {
            $this->assertTrue(true);
        }
    }
}
