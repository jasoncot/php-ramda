<?php
declare(strict_types=1);

namespace PHRamda\Tests;

use PHPUnit\Framework\TestCase;
use function PHRamda\{all, identity};

final class AllTest extends TestCase {
    public function testAll(): void
    {
        $this->assertTrue(all(identity(), [true]));
        $this->assertTrue(all(identity(), [true, true]));
        $this->assertTrue(all(identity(), [true, true, (object) ['key' => 'value']]));
    }

    public function testAll_unhappy(): void
    {
        $this->assertFalse(all(identity(), [false]));
        $this->assertFalse(all(identity(), [true, false]));
        $this->assertFalse(all(identity(), [(object) []]));
    }
}
