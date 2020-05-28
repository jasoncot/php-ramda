<?php

namespace PHRamda\Tests;

use PHPUnit\Framework\TestCase;
use function PHRamda\partial;

final class PartialTest extends TestCase
{
    public function testPartial(): void
    {
        $partiallyApplied = partial(
            function ($arg0, $arg1, $arg2) {
                $this->assertEquals('arg-0', $arg0);
                $this->assertEquals('arg-1', $arg1);
                $this->assertEquals('arg-2', $arg2);
            },
            ['arg-0', 'arg-1']
        );

        $partiallyApplied('arg-2');


        $partiallyApplied = partial(
            function ($arg0, $arg1, $arg2) {
                $this->assertEquals('arg-0', $arg0);
                $this->assertEquals('arg-1', $arg1);
                $this->assertEquals('arg-2', $arg2);
            },
            ['arg-0']
        );

        $partiallyApplied('arg-1', 'arg-2');

    }
}