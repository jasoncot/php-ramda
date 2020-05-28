<?php
declare(strict_types=1);

namespace PHRamda\Tests;

use PHPUnit\Framework\TestCase;
use function PHRamda\{addIndex, curryN, map};

final class AddIndexTest extends TestCase
{
    public function testAddIndex(): void
    {
        $map = curryN(
            2, 
            function (callable $callback, array $list) {
                return map($callback, $list);
            }
        );
        $indexedMap = addIndex($map);
        $this->assertTrue(is_callable($indexedMap));

        $iterator = $indexedMap(function ($in, $key) {
            $this->assertNotNull($in);
            $this->assertNotNull($key);

            return $key;
        });

        $iterator([1, 2, 3, 4, 5]);
    }
}