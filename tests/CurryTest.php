<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\add;
use function PHRamda\curry;

final class CurryTest extends TestCase
{
    public function testCurry(): void
    {
        $curriedAdd = curry(2, '\PHRamda\add');
        $add5 = $curriedAdd(5);
        $this->assertEquals(5, $add5(0));
    }

    public function testCurryWithValues(): void
    {
        $add5 = curry(2, '\PHRamda\add', [5]);
        $this->assertEquals(5, $add5(0));
    }

    public function testCurryUnhappyPath(): void
    {
        $curriedAdd = curry(0, '\PHRamda\add');
        try {
            $add5 = $curriedAdd(5);
            $this->assertTrue($add5);
        } catch (\ArgumentCountError $er) {
            $this->assertTrue(true);
        }
    }
}
