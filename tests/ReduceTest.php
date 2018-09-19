<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\reduce;

final class ReduceTest extends TestCase
{
    public function testReduceSum(): void
    {
        $testList = [1, 2, 3, 4, 5];
        $add = function ($a, $b) {
            return $a + $b;
        };
        $this->assertEquals(15, reduce($add, 0, $testList));
    }
}
