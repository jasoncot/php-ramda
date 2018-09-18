<?php
declare(strict_types=1);

namespace Trailoff\PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function Trailoff\PHRamda\reduceRight;

final class ReduceRightTest extends TestCase
{
    public function testHappyPath(): void
    {
        $list = [1, 2, 3, 4, 5];
        $initial = 0;
        $sum = function ($acc, $val) {
            return $acc + $val;
        };

        $this->assertEquals(15, reduceRight($sum, $initial, $list));
    }

    public function testEmptyList(): void
    {
        $list = [];
        $initial = 0;
        $sum = function ($acc, $val) {
            return $acc + $val;
        };

        $this->assertEquals(0, reduceRight($sum, $initial, $list));
    }

    public function testFailureMode(): void
    {
        $list = [1, 2, 3, 4, 5];
        $initial = 0;
        $sum = null;
        try {
            reduceRight($sum, $initial, $list);
            $this->assertTrue(false);
        } catch (\Error $ee) {
            $this->assertTrue(true);
        }
    }
}
