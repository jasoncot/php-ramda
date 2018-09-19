<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\reduceLeft;

final class ReduceLeftTest extends TestCase
{
    public function testHappyPath(): void
    {
        $list = [1, 2, 3, 4, 5];
        $initial = 0;
        $sum = function ($acc, $val) {
            return $acc + $val;
        };

        $this->assertEquals(15, reduceLeft($sum, $initial, $list));
    }

    public function testEmptyList(): void
    {
        $list = [];
        $initial = 0;
        $sum = function ($acc, $val) {
            return $acc + $val;
        };

        $this->assertEquals(0, reduceLeft($sum, $initial, $list));
    }

    public function testFailureMode(): void
    {
        $list = [1, 2, 3, 4, 5];
        $initial = 0;
        $sum = null;
        try {
            reduceLeft($sum, $initial, $list);
            $this->assertTrue(false);
        } catch (\Error $ee) {
            $this->assertTrue(true);
        }
    }
}
