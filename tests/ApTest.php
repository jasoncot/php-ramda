<?php
declare(strict_types=1);

namespace PHRamda\Tests;

use PHPUnit\Framework\TestCase;
use function PHRamda\{add, ap, multiply};

final class ApTest extends TestCase
{
    public function testAp(): void
    {
        $callbacks = [
            multiply(2),
            add(3),
        ];
        $src = [1, 2, 3];

        $this->assertEquals([2, 4, 6, 4, 5, 6], ap($callbacks, $src));
    }
}
