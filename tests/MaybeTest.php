<?php
declare(strict_types=1);

namespace PHRamdaTests;

use PHPUnit\Framework\TestCase;
use PHRamda\Functors\Maybe;

final class MaybeTest extends TestCase
{
    public function testMaybeJust(): void
    {
        $testSubject = true;
        $maybe = Maybe::fromValue($testSubject);
        $this->assertInstanceOf('\\PHRamda\\Functors\\Just', $maybe);
        $this->assertTrue($maybe->isJust());
        $this->assertFalse($maybe->isNothing());
        $this->assertEquals($testSubject, $maybe->getOrElse(null));

        $maybe = $maybe->map(function () { return false; });
        $this->assertInstanceOf('\\PHRamda\\Functors\\Just', $maybe);
        $this->assertTrue($maybe->isJust());
        $this->assertFalse($maybe->isNothing());
        $this->assertEquals(false, $maybe->getOrElse(null));
    }

    public function testMaybeNothing(): void
    {
        $maybe = Maybe::fromValue(null);
        $this->assertInstanceof('\\PHRamda\\Functors\\Nothing', $maybe);
        $this->assertFalse($maybe->isJust());
        $this->assertTrue($maybe->isNothing());
        $this->assertEquals(false, $maybe->getOrElse(false));
        $maybe = $maybe->map(function () { return false; });
        $this->assertInstanceof('\\PHRamda\\Functors\\Nothing', $maybe);
    }
}
