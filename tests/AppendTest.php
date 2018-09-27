<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use function PHRamda\append;

final class AppendTest extends TestCase
{
    public function testAppendBaseCase(): void
    {
        $testResult = append(1, []);
        $this->assertEquals(1, count($testResult));
        $this->assertEquals(1, $testResult[0]);

        $testResult = append(2, $testResult);
        $this->assertEquals(2, count($testResult));
        $this->assertEquals(1, $testResult[0]);
        $this->assertEquals(2, $testResult[1]);

        $testResult = append('orange', $testResult);
        $this->assertEquals(3, count($testResult));
        $this->assertEquals(1, $testResult[0]);
        $this->assertEquals(2, $testResult[1]);
        $this->assertEquals('orange', $testResult[2]);

        $testResult = append([], $testResult);
        $this->assertEquals(4, count($testResult));
        $this->assertEquals(1, $testResult[0]);
        $this->assertEquals(2, $testResult[1]);
        $this->assertEquals('orange', $testResult[2]);
        $this->assertEquals([], $testResult[3]);
    }
}
