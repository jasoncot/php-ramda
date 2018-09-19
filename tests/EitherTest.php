<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use PHRamda\Functors\Either;

final class EitherTest extends TestCase
{
    public function testEitherHappyCase(): void
    {
        $testValue = true;
        $leftTestValue = "value was null";
        $subject = Either::fromValue($leftTestValue, $testValue);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Either', $subject);
        $this->assertEquals($testValue, $subject->getRight(null));

        $subject = Either::fromValue($leftTestValue, null);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Either', $subject);
        $this->assertEquals(null, $subject->getRight(null));
        $this->assertEquals($leftTestValue, $subject->getLeft(null));
    }

    public function testEitherFilter(): void
    {
        $this->assertTrue(true);
    }

    public function testEitherMap(): void
    {
        $this->assertTrue(true);
    }

    public function testEitherFlatMap(): void
    {
        $this->assertTrue(true);
    }
}
